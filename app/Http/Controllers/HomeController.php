<?php

namespace App\Http\Controllers;

use App\Models\Finance\Bills;
use App\Models\Master\House;
use App\Models\Resident\User;
use App\Models\Service\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'is_verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reportData = Report::where('status', 'Pending' && 'Diproses')->get();
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

        $user = User::whereHas('roles', function ($role) {
            $role->whereIn('name', ['Resident', 'Onboarding']);
        })->count();

        $report = Report::all()->count();
        $neWreport = Report::whereIn('status', ['Pending', 'Diterima'])->count();
        $newestReport = Report::whereIn('status', ['Pending', 'Diterima'])->get();

        $bills = Bills::count();
        $billsPaid = Bills::where('status', 'Paid')
            ->whereNotNull('paid_at')
            ->sum('amount');

        // Statistik untuk chart pembayaran IWD
        $billsPaidCount = Bills::where('status', 'Paid')->count();
        $billsUnpaidCount = Bills::where('status', 'Pending')->count();
        $totalBills = $bills;
        
        // Hitung persentase
        $paidPercentage = $totalBills > 0 ? round(($billsPaidCount / $totalBills) * 100, 2) : 0;
        $unpaidPercentage = $totalBills > 0 ? round(($billsUnpaidCount / $totalBills) * 100, 2) : 0;

        // Rumah
        $house = House::all();

        return view('home', compact('greeting', 'date', 'reportData', 'user', 'report', 'neWreport','newestReport',  'billsPaid', 'bills', 'billsPaidCount', 'billsUnpaidCount', 'paidPercentage', 'unpaidPercentage','house'));
    }
}
