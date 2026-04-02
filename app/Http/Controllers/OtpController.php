<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter; // Tambahkan ini

class OtpController extends Controller
{
    public function showForm()
    {
        $user = Auth::user();

        \Log::info('OtpController@showForm called', ['user_id' => $user->id ?? null, 'is_verified' => $user?->is_verified]);

        if ($user->is_verified) {
            return redirect('/dashboard');
        }

        // Jika OTP belum ada atau sudah kadaluarsa, kirim ulang otomatis.
        if (!$user->otp || !$user->otp_expires_at || now()->gte($user->otp_expires_at)) {
            \Log::info('OTP not found or expired; sending new OTP', ['user_id' => $user->id, 'existing_otp' => $user->otp, 'expires_at' => $user->otp_expires_at]);
            $this->sendOtp($user);
            session()->flash('success', 'Kode OTP baru telah dikirim ke email Anda.');
        }

        return view('auth.verify-otp', compact('user'));
    }

    private function sendOtp($user)
    {
        $otp = (string) random_int(100000, 999999);
        $user->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        \Log::info('OTP sent', ['user_id' => $user->id, 'otp' => $otp]);

        Mail::to($user->email)->send(new OtpMail($otp));
    }

    public function verify(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);
        $user = Auth::user();
        $expiresAt = $user->otp_expires_at;
        $now = now();
        $isExpired = $expiresAt ? $now->gt($expiresAt) : null;

        // Debug logging
        \Log::info('OTP Verification Attempt', [
            'user_id' => $user->id,
            'input_otp' => $request->otp,
            'stored_otp' => $user->otp,
            'otp_type' => gettype($request->otp) . ' vs ' . gettype($user->otp),
            'expires_at' => $expiresAt,
            'now' => $now,
            'is_expired' => $isExpired,
        ]);

        if ($user->otp && $expiresAt && $user->otp === trim($request->otp) && $now->lt($expiresAt)) {
            $user->update([
                'otp' => null,
                'otp_expires_at' => null,
                'is_verified' => true
            ]);
            return redirect('user-profile')->with('success', 'Akun berhasil diverifikasi!');
        }

        $errorMessage = 'Kode OTP salah.';
        if ($expiresAt && $isExpired) {
            $errorMessage = 'Kode OTP sudah kadaluwarsa.';
        }
        if (!$user->otp || !$expiresAt) {
            $errorMessage = 'Kode OTP tidak tersedia. Silakan minta ulang kode.';
        }

        return back()->withErrors(['otp' => $errorMessage]);
    }

    public function resend()
    {
        $user = Auth::user();

        // Rate Limiter: Batasi pengiriman ulang 1x setiap 60 detik per user
        $key = 'resend-otp:' . $user->id;
        if (RateLimiter::tooManyAttempts($key, 1)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors(['otp' => "Tunggu $seconds detik sebelum mengirim ulang kode."]);
        }

        // Generate OTP baru
        $otp = (string) random_int(100000, 999999);
        $user->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        // Kirim ulang email
        Mail::to($user->email)->send(new OtpMail($otp));

        // Catat attempt untuk rate limiter (selama 60 detik)
        RateLimiter::hit($key, 60);

        return back()->with('success', 'Kode OTP baru telah dikirim ke email Anda.');
    }
}