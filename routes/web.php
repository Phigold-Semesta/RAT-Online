<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KoperasiController;

/*
|--------------------------------------------------------------------------
| Web Routes - Sistem RAT Online (Dinas Koperasi)
|--------------------------------------------------------------------------
|
| Semua rute aplikasi diatur di sini dengan pembatasan hak akses yang ketat
| menggunakan middleware CheckRole (Multi-role Authorization).
|
*/

// =========================================================================
// 0. JALUR PENGALIHAN UTAMA (Mencapai URL login yang BENAR)
// =========================================================================
Route::get('/', function () {
    return redirect()->route('login');
});


// =========================================================================
// 1. GUEST ROUTES (Hanya Bisa Diakses Jika Pengguna BELUM Login)
// =========================================================================
Route::middleware('guest')->group(function () {
    
    // Alur Masuk Sistem (Semua Aktor: Admin, Koperasi, Pengawas, Kadis)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Alur Pendaftaran Akun Mandiri (Khusus Koperasi Eksternal)
    // Dipastikan pemanggilan nama fungsi menggunakan 'showSignUp' dan 'signUp' sesuai struktur Anda
    Route::get('/signup', [AuthController::class, 'showSignUp'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signUp']);
    
});


// =========================================================================
// 2. AUTH ROUTES (Hanya Bisa Diakses Jika Pengguna SUDAH Login)
// =========================================================================
Route::middleware('auth')->group(function () {
    
    // Alur Keluar Sistem
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
});


// =========================================================================
// 3. AUTHORIZATION ROUTES (Dibatasi Secara Ketat Berdasarkan Role Aktor)
// =========================================================================

// --- KELOMPOK HAK AKSES: ADMINISTRATOR ---
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () { 
        return view('admin.dashboard'); 
    })->name('admin.dashboard');
});

// --- KELOMPOK HAK AKSES: KOPERASI (EKSTERNAL) ---
Route::middleware(['auth', 'role:koperasi'])->group(function () {
    
    // 1. Dashboard Koperasi (DIBAIKI: Sekarang memanggil method dashboard di KoperasiController)
    Route::get('/koperasi/dashboard', [KoperasiController::class, 'dashboard'])->name('koperasi.dashboard');

   // 2. Menu Profil Koperasi (DISEMPURNAKAN: Sesuai struktur view profil baru)
// Pastikan berada di dalam group middleware role:koperasi
Route::prefix('koperasi')->name('koperasi.')->group(function () {
    Route::get('/profil', [KoperasiController::class, 'profil'])->name('profil.index');
    Route::get('/profil/edit', [KoperasiController::class, 'profilEdit'])->name('profil.edit');
    Route::put('/profil/update', [KoperasiController::class, 'updateProfil'])->name('profil.update');
});
    // 3. Menu Penilaian Kesehatan (Pemkes) (DISEMPURNAKAN: Sesuai struktur view pemkes baru)
    Route::get('/koperasi/pemkes', [KoperasiController::class, 'pemkesIndex'])->name('koperasi.pemkes.index');
    Route::get('/koperasi/pemkes/create', [KoperasiController::class, 'pemkesCreate'])->name('koperasi.pemkes.create');
    Route::get('/koperasi/pemkes/{id}/edit', [KoperasiController::class, 'pemkesEdit'])->name('koperasi.pemkes.edit');
    Route::post('/koperasi/pemkes/store', [KoperasiController::class, 'pemkesStore'])->name('koperasi.pemkes.store');

    // 4. Menu Pelaksanaan RAT (DISEMPURNAKAN: Sesuai struktur view rat baru & menyelesaikan error)
    Route::get('/koperasi/rat', [KoperasiController::class, 'ratIndex'])->name('koperasi.rat.index');
    Route::get('/koperasi/rat/create', [KoperasiController::class, 'ratCreate'])->name('koperasi.rat.create');
    Route::get('/koperasi/rat/{id}/edit', [KoperasiController::class, 'ratEdit'])->name('koperasi.rat.edit');
    Route::post('/koperasi/rat/store', [KoperasiController::class, 'ratStore'])->name('koperasi.rat.store');
    
});

// --- KELOMPOK HAK AKSES: PENGAWAS LAPANGAN ---
Route::middleware(['auth', 'role:pengawas'])->group(function () {
    Route::get('/pengawas/dashboard', function () { 
        return view('pengawas.dashboard'); 
    })->name('pengawas.dashboard');
});

// --- KELOMPOK HAK AKSES: KEPALA DINAS ---
Route::middleware(['auth', 'role:kadis'])->group(function () {
    Route::get('/kadis/dashboard', function () { 
        return view('kadis.dashboard'); 
    })->name('kadis.dashboard');
});