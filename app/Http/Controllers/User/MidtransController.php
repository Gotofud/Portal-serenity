<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Finance\Bills;
use App\Models\Service\Stall;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function callback()
    {
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');

        $notif = new \Midtrans\Notification();

        $order_id = $notif->order_id;
        $status = $notif->transaction_status;

        $parts = explode('-', $order_id);
        $type = $parts[0];

        // gabungin code (tetap pakai logic kamu)
        $code = $parts[0] . '-' . $parts[1] . '-' . $parts[2];

        if ($type === 'STL') {
            $this->updateStall($code, $status);
        } elseif ($type === 'IWD') {
            $this->updateBill($code, $status);
        }

        return response()->json(['message' => 'OK']);
    }

    private function updateStall($code, $status)
    {
        $stall = Stall::where('code', $code)->first();

        if (!$stall)
            return;

        if ($status == 'settlement') {
            $stall->status = 'Aktif';
            $stall->paid_at = now();
        } elseif ($status == 'pending') {
            $stall->status = 'pending';
        } elseif ($status == 'expire') {
            $stall->status = 'expired';
        } elseif ($status == 'cancel') {
            $stall->status = 'cancelled';
        }

        $stall->save();
    }
    private function updateBill($code, $status)
    {
        $bill = Bills::where('code', $code)->first();

        if (!$bill)
            return;

        if ($status == 'settlement') {
            $bill->status = 'paid';
            $bill->paid_at = now();
        } elseif ($status == 'pending') {
            $bill->status = 'pending';
        } elseif ($status == 'expire') {
            $bill->status = 'expired';
        } elseif ($status == 'cancel') {
            $bill->status = 'cancelled';
        }

        $bill->save();
    }
}
