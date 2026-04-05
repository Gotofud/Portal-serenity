<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Finance\Bills;
use App\Models\Master\House;
use App\Models\Service\Report;
use App\Models\User;
use App\Models\User\UsersHouse;
use App\Models\Vehicles;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hour = Carbon::now()->format('H');
        $date = Carbon::now()->format('d M Y');

        if ($hour >= 5 && $hour < 12) {
            $greeting = '☀️ Selamat Pagi';
        } elseif ($hour >= 12 && $hour < 15) {
            $greeting = '🌤️ Selamat Siang';
        } elseif ($hour >= 15 && $hour < 18) {
            $greeting = '⛅️ Selamat Sore';
        } else {
            $greeting = '🌙 Selamat Malam';
        }

        $userHouse = UsersHouse::where('user_id', Auth::id())->first();
        $houseId = $userHouse->house_id ?? null; // GANTI DISINI: dari ->id ke ->house_id

        $houseCount = UsersHouse::where('user_id', Auth::id())->count();
        $vehicleCount = Vehicles::where('user_id', Auth::id())->count();

        if ($houseId) {
            $billsQuery = Bills::where('house_id', $houseId);

            // Tambahkan order agar urutan bulan tidak berantakan
            $allBills = $billsQuery->orderBy('id', 'asc')->get();

            $paidData = Bills::where('house_id', $houseId)
                ->where('status', 'Paid')
                ->selectRaw('COUNT(*) as count, SUM(amount) as total_amount')
                ->first();

            $billsPaidSum = $paidData->total_amount ?? 0;
            $billsPaidCount = $paidData->count ?? 0;
        } else {
            $billsPaidCount = 0;
            $billsPaidSum = 0;
            $allBills = collect();
        }

        $primaryHouse = UsersHouse::where('user_id', Auth::id())->where('is_primary', 'Rumah Utama')->get ();
        $secondaryHouse = UsersHouse::where('user_id', Auth::id())->where('is_primary', 'Rumah Lainnya')->get();

        return view('user.dashboard', compact('greeting', 'date', 'houseCount', 'vehicleCount', 'billsPaidCount', 'billsPaidSum', 'allBills', 'primaryHouse', 'secondaryHouse'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
