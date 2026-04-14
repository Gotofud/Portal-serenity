<?php

namespace App\Http\Controllers\User\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\Bills;
use App\Models\Master\House;
use App\Models\User\UsersHouse;
use Config;
use Illuminate\Http\Request;
use Midtrans\Snap;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $primaryHouse = UsersHouse::where('user_id', auth()->id())
            ->where('is_primary', 'Rumah Utama')
            ->get();

        $secondaryHouse = UsersHouse::where('user_id', auth()->id())
            ->where('is_primary', 'Rumah Lainnya')
            ->get();

        $primarybill = Bills::whereIn('house_id', $primaryHouse->pluck('house_id'))->get();
        $secondarybill = Bills::whereIn('house_id', $secondaryHouse->pluck('house_id'))->get();
        return view('user.bills.index', compact('primarybill', 'secondarybill','primaryHouse','secondaryHouse'));
    }

    public function pay($id)
    {
        $bill = Bills::findOrFail($id);
        $house = House::with('users_houses')->first();
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');

        $orderId = $bill->code . '-' . time();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $bill->amount,
            ],
            'customer_details' => [
                'first_name' => $house->users_houses->first()->users->user_profile->full_name ?? $house->users_houses->first()->users->name,
                'email' => $house->users_houses->first()->users->email ?? $house->users_houses->first()->users->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('user.bills.detail', compact('snapToken', 'bill', 'house'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bill = Bills::findOrFail($id);
        $house = House::with('users_houses')->first();
        return view('user.bills.detail', compact('bill', 'house'));
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
