@extends('layouts.app')

@section('title', 'Profil Koperasi')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 animate-fade-in">
    
    {{-- 1. HERO HEADER BANNER (LUXURIOUS DESIGN) --}}
    <div class="relative bg-gradient-to-br from-emerald-900 via-emerald-850 to-slate-900 rounded-3xl overflow-hidden shadow-2xl border border-emerald-500/20 mb-8 p-8 md:p-12">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(16,185,129,0.15),transparent_45%)]"></div>
        
        <div class="relative flex flex-col md:flex-row items-start md:items-center justify-between gap-6 z-10">
            <div class="flex items-center gap-6">
                <div class="p-4 bg-emerald-500/10 backdrop-blur-md rounded-2xl border border-emerald-500/30 shadow-[0_0_30px_rgba(16,185,129,0.2)]">
                    <svg class="w-12 h-12 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 uppercase tracking-widest mb-2">
                        {{ $koperasi->jenis_koperasi ?? 'Koperasi' }}
                    </span>
                    <h1 class="text-2xl md:text-4xl font-extrabold text-white tracking-tight uppercase">
                        {{ $koperasi->nama_koperasi }}
                    </h1>
                    <p class="text-slate-400 text-sm mt-1 flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Kecamatan {{ $koperasi->kecamatan ?? '-' }}
                    </p>
                </div>
            </div>
            
            {{-- PERBAIKAN: Mengubah nama rute dari koperasi.profil.edit menjadi koperasi.profilEdit --}}
           {{-- SOLUSI URL: Langsung menembak path URL, dijamin anti-error RouteNotFound --}}
<a href="{{ url('/koperasi/profil/edit') }}" class="w-full md:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl text-xs font-bold tracking-widest uppercase bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-slate-950 shadow-[0_4px_20px_rgba(16,185,129,0.3)] hover:shadow-[0_4px_25px_rgba(16,185,129,0.45)] transition-all duration-300 border border-emerald-400/20 active:scale-95">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
    Ubah Profil Berkas
</a>
        </div>
    </div>

    {{-- GRID UTAMA DATA KELEMBAGAAN --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- SISI KIRI: WIDGET SINGKAT --}}
        <div class="space-y-6">
            {{-- Card Anggota --}}
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-emerald-500/10 rounded-2xl p-6 shadow-sm dark:shadow-[0_4px_30px_rgba(0,0,0,0.2)]">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-1">Kekuatan Keanggotaan</p>
                <div class="flex items-baseline gap-2">
                    <span class="text-4xl font-black text-slate-800 dark:text-white">{{ number_format($koperasi->jumlah_anggota ?? 0, 0, ',', '.') }}</span>
                    <span class="text-xs font-medium text-slate-500">Orang Terdaftar</span>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-800 h-1.5 rounded-full mt-4 overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-1.5 rounded-full" style="width: 75%"></div>
                </div>
            </div>

            {{-- Card Kontak Penting --}}
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-emerald-500/10 rounded-2xl p-6 shadow-sm dark:shadow-[0_4px_30px_rgba(0,0,0,0.2)]">
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-800 dark:text-slate-200 border-b border-slate-100 dark:border-slate-800 pb-3 mb-4">Saluran Komunikasi</h3>
                
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-emerald-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-400 font-medium uppercase">Nomor Telepon</p>
                            <p class="text-xs font-bold text-slate-700 dark:text-slate-300">{{ $koperasi->no_telp ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-emerald-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-400 font-medium uppercase">Surel / Email</p>
                            <p class="text-xs font-bold text-slate-700 dark:text-slate-300 break-all">{{ $koperasi->email_koperasi ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SISI KANAN: DETAIL PROFIL (SEPARATED LUXURY ROWS) --}}
        <div class="lg:col-span-2 space-y-4">
            
            {{-- Row 1: Legalitas Hukum --}}
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-emerald-500/10 rounded-2xl p-6 shadow-sm dark:shadow-[0_4px_30px_rgba(0,0,0,0.25)] transition-all duration-300 hover:border-emerald-500/30">
                <h2 class="text-xs font-black uppercase tracking-widest text-emerald-600 dark:text-emerald-400 mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-3 bg-emerald-500 rounded-full"></span> Legalitas Kelembagaan
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Nomor Badan Hukum</label>
                        <p class="text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-100 dark:border-slate-800">
                            {{ $koperasi->no_badan_hukum ?? 'Belum Diinput' }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Tanggal Badan Hukum</label>
                        <p class="text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-100 dark:border-slate-800">
                            {{ $koperasi->tgl_badan_hukum ? \Carbon\Carbon::parse($koperasi->tgl_badan_hukum)->translatedFormat('d F Y') : 'Belum Diinput' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Row 2: Manajemen Struktur Pengurus --}}
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-emerald-500/10 rounded-2xl p-6 shadow-sm dark:shadow-[0_4px_30px_rgba(0,0,0,0.25)] transition-all duration-300 hover:border-emerald-500/30">
                <h2 class="text-xs font-black uppercase tracking-widest text-emerald-600 dark:text-emerald-400 mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-3 bg-emerald-500 rounded-full"></span> Struktur Inti Pengurus
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-slate-50 dark:bg-slate-950/50 p-4 rounded-xl border border-slate-100 dark:border-slate-800">
                        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block mb-1">Ketua Koperasi</span>
                        <p class="text-sm font-bold text-slate-800 dark:text-white">{{ $koperasi->nama_ketua }}</p>
                    </div>
                    <div class="bg-slate-50 dark:bg-slate-950/50 p-4 rounded-xl border border-slate-100 dark:border-slate-800">
                        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block mb-1">Sekretaris</span>
                        <p class="text-sm font-bold text-slate-800 dark:text-white">{{ $koperasi->sekertaris_koperasi ?? '-' }}</p>
                    </div>
                    <div class="bg-slate-50 dark:bg-slate-950/50 p-4 rounded-xl border border-slate-100 dark:border-slate-800">
                        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block mb-1">Bendahara</span>
                        <p class="text-sm font-bold text-slate-800 dark:text-white">{{ $koperasi->bendahara_koperasi ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- Row 3: Domisili & Sejarah Singkat --}}
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-emerald-500/10 rounded-2xl p-6 shadow-sm dark:shadow-[0_4px_30px_rgba(0,0,0,0.25)] transition-all duration-300 hover:border-emerald-500/30">
                <h2 class="text-xs font-black uppercase tracking-widest text-emerald-600 dark:text-emerald-400 mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-3 bg-emerald-500 rounded-full"></span> Domisili Kelembagaan
                </h2>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Tahun Berdiri</label>
                            <p class="text-xs font-bold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-100 dark:border-slate-800">
                                {{ $koperasi->tahun_berdiri ?? 'Belum Diinput' }}
                            </p>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Wilayah Kecamatan</label>
                            <p class="text-xs font-bold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950/50 p-3 rounded-xl border border-slate-100 dark:border-slate-800">
                                Kecamatan {{ $koperasi->kecamatan ?? '-' }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Alamat Lengkap Kantor</label>
                        <div class="text-xs font-medium text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-950/50 p-4 rounded-xl border border-slate-100 dark:border-slate-800 leading-relaxed">
                            {{ $koperasi->alamat }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
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