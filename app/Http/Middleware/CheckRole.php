<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Menangani permintaan yang masuk (Mencegat hak akses berdasarkan role).
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles (Daftar role yang diizinkan, menggunakan splat operator)
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Cek apakah user sudah login atau belum
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // 2. Ambil data user yang sedang login
        $user = Auth::user();

        // 3. Cek apakah role user saat ini ada di dalam daftar $roles yang diizinkan
        if (in_array($user->role, $roles)) {
            return $next($request); // Lolos, silakan lanjut ke halaman dashboard masing-masing
        }

        // 4. Jika tidak memiliki hak akses, lempar error 403 (Forbidden)
        abort(403, 'Anda tidak memiliki hak akses untuk membuka halaman ini.');
    }
}