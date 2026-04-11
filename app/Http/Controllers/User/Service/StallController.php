<?php

namespace App\Http\Controllers\User\Service;

use App\Http\Controllers\Controller;
use App\Models\Master\StallPlace;
use App\Models\Service\Stall;
use Auth;
use Illuminate\Http\Request;
use Midtrans\Snap;

class StallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stall = StallPlace::where('status', 'Aktif')
            ->withCount([
                'stalls' => function ($q) {
                    $q->where('status', 'Aktif'); // hanya yang sedang disewa
                }
            ])
            ->latest()
            ->paginate(10);
        return view('user.service.stall.index', compact('stall'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Silakan login terlebih dahulu');
        }

        $stallPlace = StallPlace::findOrFail($request->stall_id);
        $lastId = (Stall::max('id') ?? 0) + 1;
        $yearMonth = date('Ym');
        $invoiceCode = 'STL-' . $yearMonth . '-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
        $validated = $request->validate([
            'duration' => 'required|integer|min:1|max:24',
            'notes' => 'nullable|string|max:255'
        ]);

        $startDate = now();
        $endDate = $startDate->copy()->addDays($validated['duration'] * 30);
        $totalCost = $stallPlace->rent_amount * $validated['duration'];

        $existing = Stall::where('user_id', Auth::id())
            ->where('stall_id', $stallPlace->id)
            ->where('status', 'Pending')
            ->first();

        if ($existing) {
            $existing->update([
                'code' => $invoiceCode,
                'duration' => $validated['duration'],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'total_cost' => $totalCost,
                'notes' => $validated['notes'],
            ]);

            return redirect()
                ->route('services.payment.pay', $existing->id)
                ->with('success', 'Lanjut ke pembayaran');
        }

        $stall = Stall::create([
            'user_id' => Auth::id(),
            'code' => $invoiceCode,
            'stall_id' => $stallPlace->id,
            'duration' => $validated['duration'],
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_cost' => $totalCost,
            'notes' => $validated['notes'],
            'status' => 'Pending',
        ]);

        return redirect()
            ->route('services.payment.pay', $stall->id)
            ->with('success', 'Lanjut ke pembayaran');
    }
    public function show($id)
    {
        $stall = StallPlace::withCount([
            'stalls' => function ($q) {
                $q->where('status', 'Aktif');
            }
        ])->findOrFail($id);

        // PAGINATE RELATION
        $renters = $stall->stalls()
            ->with('users.user_profile')
            ->latest()
            ->paginate(1);

        $myStall = Stall::where('user_id', Auth::id())
            ->where('stall_id', $stall->id)
            ->whereIn('status', ['Pending', 'Aktif'])
            ->first();

        return view('user.service.stall.detail', compact('stall', 'renters','myStall'));
    }

    public function pay($id)
    {
        $stall = Stall::with('stall_place')->findOrFail($id);
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');

        $orderId = $stall->code . '-' . time();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $stall->total_cost,
            ],
            'customer_details' => [
                'first_name' => $stall->users->user_profile->full_name ?? $stall->users->name,
                'email' => $stall->users->email ?? $stall->users->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('user.service.stall.payment', compact('snapToken', 'stall'));
    }

    public function callback()
    {
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');

        $notif = new \Midtrans\Notification();

        $order_id = $notif->order_id;
        $status = $notif->transaction_status;

        $parts = explode('-', $order_id);

        // gabungkan balik sesuai format code kamu
        $code = $parts[0] . '-' . $parts[1] . '-' . $parts[2];

        $stall = Stall::where('code', $code)->first();

        if (!$stall) {
            return response()->json(['message' => 'not found']);
        }

        if ($status == 'settlement') {
            $stall->status = 'Aktif';
            $stall->paid_at = now();
        } elseif ($status == 'pending') {
            $stall->status = 'Pending';
        } elseif ($status == 'expire') {
            $stall->status = 'expired';
        } elseif ($status == 'cancel') {
            $stall->status = 'cancelled';
        }

        $stall->save();

        return redirect()->back()->with('success', 'Berhasil mengubah status');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
