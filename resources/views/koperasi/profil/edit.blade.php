@extends('layouts.app')

@section('title', 'Ubah Profil Koperasi')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 animate-fade-in">

    {{-- HEADER FORM (LUXURIOUS DESIGN) --}}
    <div class="relative bg-gradient-to-br from-emerald-900 via-emerald-850 to-slate-900 rounded-3xl overflow-hidden shadow-2xl border border-emerald-500/20 mb-8 p-8">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(16,185,129,0.15),transparent_45%)]"></div>
        
        <div class="relative flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 z-10">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-emerald-500/10 backdrop-blur-md rounded-xl border border-emerald-500/30 text-emerald-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl md:text-2xl font-extrabold text-white tracking-tight uppercase">Ubah Berkas Profil</h1>
                    <p class="text-slate-400 text-xs mt-0.5">Perbarui informasi kelembagaan, legalitas, dan manajemen inti koperasi Anda.</p>
                </div>
            </div>
            
            {{-- Tombol Kembali --}}
            <a href="{{ url('/koperasi/profil') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-bold tracking-wider uppercase bg-slate-800 hover:bg-slate-750 text-slate-300 border border-slate-700/60 transition-all duration-200 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>
    </div>

    {{-- ALERTI ERROR VALIDASI --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 rounded-2xl flex gap-3 items-start animate-fade-in">
            <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            <div>
                <h5 class="text-sm font-bold text-red-500 uppercase tracking-wide">Periksa Kembali Isian Anda!</h5>
                <ul class="list-disc list-inside text-xs text-red-400/90 mt-1 space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- FORM UTAMA --}}
    <form action="{{ route('koperasi.profil.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- BLOCK 1: IDENTITAS UTAMA KOPERASI --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-emerald-500/10 rounded-2xl p-6 shadow-sm dark:shadow-[0_4px_30px_rgba(0,0,0,0.2)]">
            <h2 class="text-xs font-black uppercase tracking-widest text-emerald-600 dark:text-emerald-400 mb-5 flex items-center gap-2">
                <span class="w-1.5 h-3 bg-emerald-500 rounded-full"></span> Identitas Utama Kelembagaan
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="nama_koperasi" class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Nama Koperasi <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_koperasi" id="nama_koperasi" value="{{ old('nama_koperasi', $koperasi->nama_koperasi) }}" required
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">
                </div>

                <div>
                    <label for="jenis_koperasi" class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Jenis Koperasi</label>
                    <input type="text" name="jenis_koperasi" id="jenis_koperasi" value="{{ old('jenis_koperasi', $koperasi->jenis_koperasi) }}" placeholder="Contoh: KSP, KSU, Jasa"
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">
                </div>
            </div>
        </div>

        {{-- BLOCK 2: LEGALITAS HUKUM & OPERASIONAL --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-emerald-500/10 rounded-2xl p-6 shadow-sm dark:shadow-[0_4px_30px_rgba(0,0,0,0.2)]">
            <h2 class="text-xs font-black uppercase tracking-widest text-emerald-600 dark:text-emerald-400 mb-5 flex items-center gap-2">
                <span class="w-1.5 h-3 bg-emerald-500 rounded-full"></span> Legalitas & Hukum
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="md:col-span-2">
                    <label for="no_badan_hukum" class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Nomor Badan Hukum</label>
                    <input type="text" name="no_badan_hukum" id="no_badan_hukum" value="{{ old('no_badan_hukum', $koperasi->no_badan_hukum) }}"
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">
                </div>

                <div>
                    <label for="tgl_badan_hukum" class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Tanggal Badan Hukum</label>
                    <input type="date" name="tgl_badan_hukum" id="tgl_badan_hukum" value="{{ old('tgl_badan_hukum', $koperasi->tgl_badan_hukum) }}"
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">
                </div>
            </div>
        </div>

        {{-- BLOCK 3: MANAJEMEN STRUKTUR PENGURUS & ANGGOTA --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-emerald-500/10 rounded-2xl p-6 shadow-sm dark:shadow-[0_4px_30px_rgba(0,0,0,0.2)]">
            <h2 class="text-xs font-black uppercase tracking-widest text-emerald-600 dark:text-emerald-400 mb-5 flex items-center gap-2">
                <span class="w-1.5 h-3 bg-emerald-500 rounded-full"></span> Struktur Manajemen Inti & Anggota
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                <div class="md:col-span-1">
                    <label for="jumlah_anggota" class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Jumlah Anggota (Orang)</label>
                    <input type="number" name="jumlah_anggota" id="jumlah_anggota" value="{{ old('jumlah_anggota', $koperasi->jumlah_anggota) }}" min="0"
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">
                </div>

                <div class="md:col-span-1">
                    <label for="nama_ketua" class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Nama Ketua Koperasi <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_ketua" id="nama_ketua" value="{{ old('nama_ketua', $koperasi->nama_ketua) }}" required
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">
                </div>

                <div class="md:col-span-1">
                    <label for="sekertaris_koperasi" class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Nama Sekretaris</label>
                    <input type="text" name="sekertaris_koperasi" id="sekertaris_koperasi" value="{{ old('sekertaris_koperasi', $koperasi->sekertaris_koperasi) }}"
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">
                </div>

                <div class="md:col-span-1">
                    <label for="bendahara_koperasi" class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Nama Bendahara</label>
                    <input type="text" name="bendahara_koperasi" id="bendahara_koperasi" value="{{ old('bendahara_koperasi', $koperasi->bendahara_koperasi) }}"
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">
                </div>
            </div>
        </div>

        {{-- BLOCK 4: SALURAN KOMUNIKASI & DOMISILI ALAMAT --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-emerald-500/10 rounded-2xl p-6 shadow-sm dark:shadow-[0_4px_30px_rgba(0,0,0,0.2)]">
            <h2 class="text-xs font-black uppercase tracking-widest text-emerald-600 dark:text-emerald-400 mb-5 flex items-center gap-2">
                <span class="w-1.5 h-3 bg-emerald-500 rounded-full"></span> Saluran Komunikasi & Domisili
            </h2>
            
            <div class="space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Tahun Berdiri</label>
                        <input type="number" name="tahun_berdiri" id="tahun_berdiri" value="{{ old('tahun_berdiri', $koperasi->tahun_berdiri) }}" placeholder="Contoh: 2018"
                               class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">
                    </div>
                    <div>
                        <label for="no_telp" class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Nomor Telepon Kontak</label>
                        <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $koperasi->no_telp) }}"
                               class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">
                    </div>
                    <div>
                        <label for="email_koperasi" class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Surel / Email Koperasi</label>
                        <input type="email" name="email_koperasi" id="email_koperasi" value="{{ old('email_koperasi', $koperasi->email_koperasi) }}"
                               class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="md:col-span-1">
                        <label for="kecamatan" class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Wilayah Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan', $koperasi->kecamatan) }}" placeholder="Masukkan nama kecamatan"
                               class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">
                    </div>
                    <div class="md:col-span-2">
                        <label for="alamat" class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Alamat Lengkap Kantor <span class="text-red-500">*</span></label>
                        <textarea name="alamat" id="alamat" rows="1" required
                                  class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-200 dark:border-slate-800 focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-500/60 focus:ring-1 focus:ring-emerald-500 transition-all duration-200">{{ old('alamat', $koperasi->alamat) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- FOOTER BUTTON ACTION --}}
        <div class="flex items-center justify-end gap-4 pt-2">
            <button type="reset" class="px-5 py-3 rounded-xl text-xs font-bold tracking-wider uppercase text-slate-500 dark:text-slate-400 bg-transparent hover:bg-slate-100 dark:hover:bg-slate-800 transition duration-200">
                Reset Ulang
            </button>
            
            <button type="submit" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl text-xs font-bold tracking-widest uppercase bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-slate-950 shadow-[0_4px_20px_rgba(16,185,129,0.3)] hover:shadow-[0_4px_25px_rgba(16,185,129,0.45)] transition-all duration-300 border border-emerald-400/20 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
</style>
@endsection