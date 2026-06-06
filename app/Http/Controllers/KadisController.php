<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koperasi; // Asumsi model Koperasi sudah ada
use App\Models\Laporan;  // Asumsi model Laporan sudah ada

class KadisController extends Controller
{
    /**
     * Menampilkan dashboard utama untuk Kepala Dinas.
     */
    public function dashboard()
    {
        // Anda bisa menambahkan logika untuk statistik di sini
        // Contoh: $totalKoperasi = Koperasi::count();
        return view('kadis.dashboard');
    }

    /**
     * Menampilkan daftar data koperasi untuk Kepala Dinas.
     */
    public function dataKoperasi()
    {
        // Mengambil semua data koperasi
        $koperasis = Koperasi::latest()->paginate(10);
        return view('kadis.data-koperasi', compact('koperasis'));
    }

    /**
     * Menampilkan halaman indeks untuk laporan dan validasi.
     */
    public function laporanIndex()
    {
        // Mengambil data laporan yang perlu divalidasi
        $laporans = Laporan::where('status', 'menunggu')->latest()->get();
        return view('kadis.laporan.index', compact('laporans'));
    }

    /**
     * Contoh fungsi untuk proses validasi laporan.
     */
    public function validasiLaporan(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);
        
        $laporan->update([
            'status' => $request->status, // misal: 'disetujui' atau 'ditolak'
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('kadis.laporan.index')->with('success', 'Laporan berhasil divalidasi.');
    }
}