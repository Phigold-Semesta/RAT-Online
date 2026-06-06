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
    // Mengambil data koperasi diurutkan dari yang terbaru dan dipaginate
    $koperasis = Koperasi::latest()->paginate(10);
    
    // Perbaikan path view sesuai dengan struktur folder di Screenshot 2026-06-06 205954.png
    return view('kadis.data_koperasi.index', compact('koperasis'));
}

 /**
 * Menampilkan halaman indeks untuk seluruh laporan.
 * Data diurutkan: yang statusnya 'proses' muncul paling atas, baru diikuti yang lain.
 */
public function laporanIndex()
{
    // Menggunakan orderByRaw untuk prioritas status 'proses'
    $laporans = Laporan::orderByRaw("FIELD(status_laporan, 'proses', 'disahkan', 'draft')")
                       ->latest()
                       ->paginate(10); 

    return view('kadis.laporan.index', compact('laporans'));
}

/**
 * Proses validasi laporan dengan validasi request yang ketat.
 */
public function validasiLaporan(Request $request, $id)
{
    // 1. Validasi input: memastikan status sesuai dengan ENUM database
    $request->validate([
        'status_laporan' => 'required|in:proses,disahkan,draft', // Menambah 'draft' agar fleksibel
        'catatan_revisi' => 'nullable|string|max:500',
    ]);

    // 2. Menggunakan database transaction untuk integritas data
    return \Illuminate\Support\Facades\DB::transaction(function () use ($request, $id) {
        $laporan = Laporan::findOrFail($id);
        
        $laporan->update([
            'status_laporan' => $request->status_laporan,
            'catatan_revisi' => $request->catatan_revisi,
        ]);

        return redirect()->route('kadis.laporan.index')
                         ->with('success', 'Laporan #' . $laporan->id_laporan . ' telah diperbarui menjadi ' . $request->status_laporan . '.');
    });
}
}