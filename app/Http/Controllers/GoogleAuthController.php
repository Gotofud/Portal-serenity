<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\User\UserProfile;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Gagal login menggunakan Google.');
        }

        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
                'role_id' => 3,
                'is_verified' => false, // Pastikan default false untuk user baru
            ]);
        } else {
            $user->update([
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
            ]);
        }

        Auth::login($user);

        if (!$user->is_verified) {
            $this->sendOtp($user);
            return redirect()->route('verify-otp.view');
        } 

        if (!$user->user_profile() ) {
            return redirect()->route('user-profile.index');
        }

        return redirect('/dashboard');
    }
    private function sendOtp($user)
    {
        $otp = random_int(100000, 999999);
        $user->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        // Kirim email di sini
        Mail::to($user->email)->send(new OtpMail($otp));
    }

}
