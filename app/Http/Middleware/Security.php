<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Security
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // 1. Jika user belum login, biarkan laravel menangani (biasanya redirect ke login)
        if (!$user) {
            return $next($request);
        }

        // 2. JIKA USER BELUM VERIFIKASI, JANGAN CEK ROLE!
        // Biarkan Middleware IsVerified yang memutuskan nasib mereka.
        if (!$user->is_verified) {
            return $next($request);
        }

        // 3. SEKARANG baru cek Role karena user sudah verified
        if ($user->roles && in_array($user->roles->name, ['Super Admin', 'Admin'])) {
            return $next($request);
        }

        // 4. Jika user sudah verified tapi rolenya tidak cocok, baru blokir
        abort(403, 'Akses ditolak: Anda tidak memiliki hak akses sebagai Admin.');
    }
}
