<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Koperasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // ==========================================
    // 1. HALAMAN VIEW (GET)
    // ==========================================

    /**
     * Menampilkan halaman login utama
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Menampilkan halaman pendaftaran mandiri koperasi
     */
    public function showSignUp()
    {
        return view('auth.signup');
    }

    // ==========================================
    // 2. LOGIKA PROSES (POST)
    // ==========================================

    /**
     * Memproses autentikasi login untuk semua aktor
     */
    public function login(Request $request)
    {
        // Validasi input form login
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba melakukan login dengan kredensial yang diberikan
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Ambil data user yang berhasil login
            $user = Auth::user();

            // Pengalihan halaman otomatis berdasarkan role aktor
            return match ($user->role) {
                'admin'    => redirect()->intended(route('admin.dashboard')),
                'koperasi' => redirect()->intended(route('koperasi.dashboard')),
                'pengawas' => redirect()->intended(route('pengawas.dashboard')),
                'kadis'    => redirect()->intended(route('kadis.dashboard')),
                default    => redirect()->route('login'),
            };
        }

        // Jika login gagal, kembalikan dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan salah.',
        ])->onlyInput('username');
    }

    /**
     * Memproses pendaftaran mandiri koperasi (Menyimpan ke 2 tabel sekaligus)
     */
    public function signUp(Request $request)
    {
        // Validasi seluruh input form gabungan pendaftaran koperasi
        $request->validate([
            // Validasi untuk tabel 'user'
            'username'           => 'required|string|max:255|unique:user,username',
            'email'              => 'required|string|email|max:255|unique:user,email',
            'password'           => 'required|string|min:8|confirmed',
            'no_telp'            => 'required|string|max:15',
            
            // Validasi untuk tabel 'koperasi'
            'nama_koperasi'       => 'required|string|max:255',
            'jenis_koperasi'      => 'required|string|max:150',
            'alamat'              => 'required|string',
            'kecamatan'           => 'required|string|max:100',
            'ketua_koperasi'      => 'required|string|max:255',
            'bendahara_koperasi'  => 'required|string|max:255',
            'sekertaris_koperasi' => 'required|string|max:255',
            'jumlah_anggota'      => 'required|integer|min:1',
            'tanggal_berdiri'     => 'required|date',
        ]);

        // Menggunakan Database Transaction demi keamanan data bertingkat
        DB::transaction(function () use ($request) {
            
            // Langkah A: Simpan data kredensial login ke tabel 'user'
            $user = User::create([
                'username' => $request->username,
                'email'    => $request->email,
                'password' => Hash::make($request->password), // Password wajib di-hash!
                'no_telp'  => $request->no_telp,
                'role'     => 'koperasi', // Otomatis mengunci role sebagai koperasi eksternal
            ]);

            // Langkah B: Simpan data profil detail koperasi ke tabel 'koperasi'
            Koperasi::create([
                'id_user'             => $user->id_user, // Mengikat Foreign Key dari id_user yang baru dibuat
                'nama_koperasi'       => $request->nama_koperasi,
                'jenis_koperasi'      => $request->jenis_koperasi,
                'alamat'              => $request->alamat,
                'kecamatan'           => $request->kecamatan,
                'ketua_koperasi'      => $request->ketua_koperasi,
                'bendahara_koperasi'  => $request->bendahara_koperasi,
                'sekertaris_koperasi' => $request->sekertaris_koperasi,
                'jumlah_anggota'      => $request->jumlah_anggota,
                'tanggal_berdiri'     => $request->tanggal_berdiri,
                'status_koperasi'     => 'pending', // Menunggu persetujuan admin dinas
            ]);
        });

        // Pendaftaran sukses, arahkan kembali ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Pendaftaran koperasi berhasil! Silakan tunggu konfirmasi aktivasi akun dari Administrator.');
    }

    /**
     * Memproses keluar sistem (Logout)
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}