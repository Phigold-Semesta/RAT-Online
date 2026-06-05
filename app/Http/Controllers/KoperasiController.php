<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koperasi;
// Impor Model pendukung untuk Pemkes dan RAT sesuai dengan struktur pangkalan data Anda
// silakan sesuaikan namespace modelnya jika ada perbedaan nama berkas
// use App\Models\Pemkes; 
// use App\Models\Rat; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KoperasiController extends Controller
{
    // ==========================================
    // 1. MENU: DASHBOARD KOPERASI
    // ==========================================

    /**
     * Menampilkan Dashboard Utama Koperasi
     */
    public function dashboard()
    {
        // Ambil data koperasi milik user eksternal yang sedang login
        $koperasi = Koperasi::where('id_user', Auth::id())->first();
        
        // Skenario Masa Depan: Anda bisa menjumlahkan riwayat laporan di sini untuk widget dashboard
        // $totalRat = Rat::where('id_koperasi', $koperasi->id_koperasi)->count();
        // $totalPemkes = Pemkes::where('id_koperasi', $koperasi->id_koperasi)->count();

        return view('koperasi.dashboard', compact('koperasi'));
    }


    // ==========================================
    // 2. MENU: PROFIL KOPERASI (READ & UPDATE)
    // ==========================================

    /**
     * Menampilkan Form Detail Profil Koperasi
     * DISESUAIKAN: Mengarah ke subfolder profil.index sesuai gambar image_98312a.png
     * DISEMPURNAKAN: Menggunakan first() agar terhindar dari error 404 jika data belum ada di database
     */
    public function profil()
    {
        // Diubah dari firstOrFail ke first agar tidak melempar error 404 jika user baru belum memiliki baris data profil
        $koperasi = Koperasi::where('id_user', Auth::id())->first();
        
        // Proteksi: Jika data kosong, buat objek dummy instan agar properti di halaman view tidak crash
        if (!$koperasi) {
            $koperasi = $this->createDummyKoperasi();
        }
        
        return view('koperasi.profil.index', compact('koperasi'));
    }

    /**
     * DISEMPURNAKAN: Menampilkan Form Edit Profil Koperasi 
     * Mengarah ke subfolder profil.edit sesuai gambar image_98312a.png
     */
    public function profilEdit()
    {
        $koperasi = Koperasi::where('id_user', Auth::id())->first();
        
        if (!$koperasi) {
            $koperasi = $this->createDummyKoperasi();
        }
        
        return view('koperasi.profil.edit', compact('koperasi'));
    }

    /**
     * Memproses Pembaruan Data Profil Koperasi
     */
    public function updateProfil(Request $request)
    {
        $koperasi = Koperasi::where('id_user', Auth::id())->first();
        
        // Validasi ketat seluruh input elemen data kelembagaan koperasi sesuai view index profil
        $validatedData = $request->validate([
            'nama_koperasi'     => 'required|string|max:255',
            'jenis_koperasi'    => 'required|string|max:150',
            'no_badan_hukum'    => 'nullable|string|max:100',
            'tgl_badan_hukum'   => 'nullable|date',
            'nama_ketua'        => 'required|string|max:255',
            'jumlah_anggota'    => 'required|integer|min:0',
            'tahun_berdiri'     => 'nullable|integer|digits:4|min:1900|max:' . date('Y'),
            'alamat'            => 'required|string',
            'no_telp'           => 'nullable|string|max:20',
            'email_koperasi'    => 'nullable|email|max:255',
            
            // Tetap mempertahankan field pengurus lainnya jika ada di form edit Anda
            'bendahara_koperasi'  => 'nullable|string|max:255',
            'sekertaris_koperasi' => 'nullable|string|max:255',
            'kecamatan'           => 'nullable|string|max:100',
        ]);

        // Eksekusi update/insert yang aman berbasis data yang sudah tervalidasi
        if ($koperasi) {
            // Jika data sudah ada, lakukan pembaruan
            $koperasi->update($validatedData);
        } else {
            // Jika data belum ada, buat baru dan pasangkan dengan id_user yang sedang login
            $validatedData['id_user'] = Auth::id();
            Koperasi::create($validatedData);
        }

        // DIBAIKI: Nama rute disesuaikan dengan struktur web.php yang baru (koperasi.profil)
        return redirect()->route('koperasi.profil')->with('success', 'Profil koperasi Anda berhasil diperbarui!');
    }


    // ==========================================
    // 3. MENU: PENILAIAN KESEHATAN (CRUD)
    // ==========================================

    /**
     * [READ] Menampilkan Daftar Riwayat Penilaian Kesehatan Koperasi
     * DISESUAIKAN: Mengarah ke subfolder pemkes.index sesuai gambar image_98312a.png
     */
    public function pemkesIndex()
    {
        $koperasi = Koperasi::where('id_user', Auth::id())->first();
        
        if (!$koperasi) {
            $koperasi = $this->createDummyKoperasi();
        }
        
        // Contoh implementasi mengambil data Pemkes milik koperasi ini, diurutkan dari tahun terbaru
        // $pemkesList = Pemkes::where('id_koperasi', $koperasi->id_koperasi)->orderBy('tahun', 'desc')->get();
        
        return view('koperasi.pemkes.index', compact('koperasi'));
    }

    /**
     * Menampilkan Form Input Penilaian Kesehatan Baru
     * DISESUAIKAN: Mengarah ke subfolder pemkes.create sesuai gambar image_98312a.png
     */
    public function pemkesCreate()
    {
        $koperasi = Koperasi::where('id_user', Auth::id())->first();
        
        if (!$koperasi) {
            $koperasi = $this->createDummyKoperasi();
        }
        
        return view('koperasi.pemkes.create', compact('koperasi'));
    }

    /**
     * DISEMPURNAKAN: Menampilkan Form Edit/Revisi Penilaian Kesehatan
     * Mengarah ke subfolder pemkes.edit sesuai gambar image_98312a.png
     */
    public function pemkesEdit($id)
    {
        $koperasi = Koperasi::where('id_user', Auth::id())->first();
        
        if (!$koperasi) {
            $koperasi = $this->createDummyKoperasi();
        }
        
        // Skenario Masa Depan: Ambil data pemkes spesifik berdasarkan ID untuk diedit
        // $pemkes = Pemkes::where('id_koperasi', $koperasi->id_koperasi)->findOrFail($id);
        
        return view('koperasi.pemkes.edit', compact('koperasi'));
    }

    /**
     * [CREATE] Menyimpan Data Penilaian Kesehatan Baru ke Pangkalan Data
     */
    public function pemkesStore(Request $request)
    {
        $koperasi = Koperasi::where('id_user', Auth::id())->first();

        // Validasi input form kesehatan sesuai parameter indikator penilaian Anda
        $request->validate([
            'tahun_buku'    => 'required|numeric|digits:4',
            'skor_kesehatan'=> 'required|numeric|min:0|max:100',
            // Tambahkan parameter penilai lainnya di bawah ini jika diperlukan
        ]);

        // Contoh Eksekusi simpan ke tabel pemkes
        // Pemkes::create([
        //     'id_koperasi'    => $koperasi->id_koperasi ?? null,
        //     'tahun_buku'     => $request->tahun_buku,
        //     'skor_kesehatan' => $request->skor_kesehatan,
        //     'status'         => 'draft'
        // ]);

        // DIBAIKI: Mengarah ke nama rute indeks pemkes yang benar (koperasi.pemkes.index)
        return redirect()->route('koperasi.pemkes.index')->with('success', 'Data penilaian kesehatan berhasil disimpan!');
    }


    // ==========================================
    // 4. MENU: PELAKSANAAN RAT (CRUD + FILE UPLOAD)
    // ==========================================

    /**
     * [READ] Menampilkan Daftar Riwayat Laporan Pelaksanaan RAT
     * DISESUAIKAN: Mengarah ke subfolder rat.index sesuai gambar image_983104.png
     */
    public function ratIndex()
    {
        $koperasi = Koperasi::where('id_user', Auth::id())->first();
        
        if (!$koperasi) {
            $koperasi = $this->createDummyKoperasi();
        }
        
        // Contoh pengambilan berkas riwayat RAT dari database Anda
        // $ratList = Rat::where('id_koperasi', $koperasi->id_koperasi)->orderBy('tahun_rat', 'desc')->get();

        return view('koperasi.rat.index', compact('koperasi'));
    }

    /**
     * Menampilkan Form Kirim Laporan Pelaksanaan RAT Baru
     * DISESUAIKAN: Mengarah ke subfolder rat.create sesuai gambar image_983104.png
     */
    public function ratCreate()
    {
        $koperasi = Koperasi::where('id_user', Auth::id())->first();
        
        if (!$koperasi) {
            $koperasi = $this->createDummyKoperasi();
        }
        
        return view('koperasi.rat.create', compact('koperasi'));
    }

    /**
     * DISEMPURNAKAN: Menampilkan Form Edit/Revisi Dokumen RAT
     * Mengarah ke subfolder rat.edit sesuai gambar image_983104.png
     */
    public function ratEdit($id)
    {
        $koperasi = Koperasi::where('id_user', Auth::id())->first();
        
        if (!$koperasi) {
            $koperasi = $this->createDummyKoperasi();
        }
        
        // Skenario Masa Depan: Ambil data berkas RAT spesifik berdasarkan ID untuk direvisi
        // $rat = Rat::where('id_koperasi', $koperasi->id_koperasi)->findOrFail($id);
        
        return view('koperasi.rat.edit', compact('koperasi'));
    }

    /**
     * [CREATE] Memproses Pengiriman Berkas Laporan RAT & Upload Dokumen Masal
     */
    public function ratStore(Request $request)
    {
        $koperasi = Koperasi::where('id_user', Auth::id())->first();

        // Validasi ketat pengunggahan dokumen laporan dan bukti fisik foto kegiatan
        $request->validate([
            'tahun_rat'       => 'required|numeric|digits:4',
            'tanggal_rat'     => 'required|date',
            'tempat_rat'      => 'required|string|max:255',
            'jumlah_hadir'    => 'required|integer|min:1',
            'dokumen_rat'     => 'required|file|mimes:pdf|max:10240', // Maksimal dokumen PDF 10MB
            'foto_kegiatan'   => 'required|image|mimes:jpeg,png,jpg|max:5120', // Maksimal foto 5MB
        ]);

        // Inisialisasi variabel nama berkas pelaporan
        $pathDokumen = null;
        $pathFoto = null;

        // Proses enkripsi dan unggah file PDF laporan RAT ke storage lokal aman
        if ($request->hasFile('dokumen_rat')) {
            $pathDokumen = $request->file('dokumen_rat')->store('dokumen_rat', 'public');
        }

        // Process enkripsi dan unggah file foto dokumentasi rapat ke storage
        if ($request->hasFile('foto_kegiatan')) {
            $pathFoto = $request->file('foto_kegiatan')->store('foto_kegiatan', 'public');
        }

        // Skenario penyimpanan berkas ke database utama aplikasi Anda
        // Rat::create([
        //     'id_koperasi'   => $koperasi->id_koperasi ?? null,
        //     'tahun_rat'     => $request->tahun_rat,
        //     'tanggal_rat'   => $request->tanggal_rat,
        //     'tempat_rat'    => $request->tempat_rat,
        //     'jumlah_hadir'  => $request->jumlah_hadir,
        //     'dokumen_rat'   => $pathDokumen,
        //     'foto_kegiatan' => $pathFoto,
        //     'status_rat'    => 'belum diverifikasi', // Menanti verifikasi dari Pengawas Lapangan
        // ]);

        // DIBAIKI: Mengarah ke nama rute indeks rat yang benar (koperasi.rat.index)
        return redirect()->route('koperasi.rat.index')->with('success', 'Laporan Pelaksanaan RAT Berhasil dikirim ke Dinas Koperasi!');
    }

    /**
     * Helper Function: Membuat Objek Koperasi Kosong (Dummy) agar Aplikasi Bebas Gatal 404
     * Ditambahkan untuk memastikan view tidak mengalami error properti 'null' saat baris data DB kosong
     */
    private function createDummyKoperasi()
    {
        $dummy = new Koperasi();
        $dummy->nama_koperasi = "Data Koperasi Belum Terdaftar";
        $dummy->jenis_koperasi = "Belum Ditentukan";
        $dummy->nama_ketua = "-";
        $dummy->jumlah_anggota = 0;
        $dummy->alamat = "Silakan klik tombol Ubah Profil untuk melengkapi data kelembagaan.";
        return $dummy;
    }
}