<?php

namespace App\Http\Controllers;

use App\Models\Koperasi; 
use App\Models\Laporan; // Menggunakan model Laporan.php yang tersedia
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; // Tambahkan ini untuk akses Auth yang lebih stabil

class PengawasController extends Controller
{
 public function dashboard()
    {
        // Menyesuaikan dengan kolom database asli: 'status_koperasi'
        $data = [
            'totalPending'    => Koperasi::where('status_koperasi', 'pending')->count(),
            'countPending'    => Koperasi::where('id_user', Auth::id())->count(), // Sesuaikan id_user/pengawas
            'countKunjungan'  => Laporan::count(),
            'countSelesai'    => Laporan::where('status_laporan', 'disahkan')->count(), // enum di DB: 'disahkan'
            'countBermasalah' => Koperasi::where('status_koperasi', 'bermasalah')->count(),
            
            // Mengambil 5 Koperasi terbaru
            'tugasTerbaru'    => Koperasi::latest()->take(5)->get()
        ];

        return view('pengawas.dashboard', $data);
    }
    /**
     * READ: Daftar Tugas
     */
    public function tugas_index()
    {
        $tugas = Koperasi::where('id_pengawas', Auth::id())
                         ->latest()
                         ->paginate(10);
        return view('pengawas.tugas.index', compact('tugas'));
    }

    /**
     * CREATE: Menampilkan form verifikasi
     */
    public function formVerifikasi($id)
    {
        $koperasi = Koperasi::findOrFail($id);
        return view('pengawas.tugas.verifikasi', compact('koperasi'));
    }

    /**
     * CREATE: Menyimpan hasil verifikasi ke model Laporan
     */
    public function simpanVerifikasi(Request $request, $id)
    {
        $request->validate([
            'hasil_catatan' => 'required|string',
            'status_lapangan' => 'required|in:selesai,terkendala,pending',
        ]);

        $pengawasId = Auth::id(); // Ambil ID di luar transaksi agar aman

        DB::transaction(function () use ($request, $id, $pengawasId) {
            Laporan::create([
                'id_koperasi' => $id, // Sesuaikan dengan kolom di tabel Laporan Anda
                'id_pengawas' => $pengawasId,
                'catatan_revisi' => $request->hasil_catatan, // Sesuaikan dengan nama kolom di tabel
                'status_laporan' => $request->status_lapangan, // Sesuaikan dengan kolom status_laporan
            ]);
        });

        return redirect()->route('pengawas.tugas.index')
                         ->with('success', 'Hasil verifikasi lapangan berhasil disimpan.');
    }

    /**
     * READ: Riwayat Kunjungan
     */
    public function riwayat_index()
    {
        $riwayat = Laporan::where('id_pengawas', Auth::id())
                          ->latest()
                          ->paginate(10);
        return view('pengawas.riwayat.index', compact('riwayat'));
    }

    /**
     * UPDATE: Mengubah data verifikasi
     */
    public function updateVerifikasi(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);
        
        $laporan->update([
            'catatan_revisi' => $request->hasil_catatan,
            'status_laporan' => $request->status_lapangan,
        ]);

        return redirect()->route('pengawas.riwayat.index')
                         ->with('success', 'Data verifikasi berhasil diperbarui.');
    }

    /**
     * DELETE: Menghapus data verifikasi
     */
    public function hapusVerifikasi($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('pengawas.riwayat.index')
                         ->with('success', 'Data berhasil dihapus.');
    }
}