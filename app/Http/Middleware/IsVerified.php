<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsVerified
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Jika user login tapi belum verifikasi
        if ($user && !$user->is_verified) {
            
            // Cek apakah route saat ini BUKAN bag  ian dari proses OTP
            // Kita pakai 'verify-otp.*' agar cocok dengan 'verify-otp.view', 'verify-otp.submit', dll.
            if (!$request->routeIs('verify-otp.*')) {
                return redirect()->route('verify-otp.view');
            }
        }

        return $next($request);
    }
}