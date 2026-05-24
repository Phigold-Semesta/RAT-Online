@extends('layouts.app')

@section('title', 'Dashboard Koperasi')

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-10 pb-6 border-b-2 border-slate-200">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="w-8 h-[2px] bg-purple-500 rounded-full"></span>
                    <p class="text-[11px] font-bold text-purple-600 tracking-[0.2em] uppercase">Portal Koperasi Terdaftar</p>
                </div>
                <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">
                    Koperasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-500">Maju Sukaseuri</span>
                </h1>
                <p class="text-sm text-slate-500 mt-1">ID Koperasi: <span class="font-mono text-xs bg-slate-200/70 px-2 py-0.5 rounded text-slate-700 font-bold">KOP-42190</span> • Kelola kewajiban pelaporan berkas badan hukum Anda.</p>
            </div>
            
            <button class="px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white text-xs font-bold rounded-2xl shadow-md shadow-purple-200 transition duration-300 uppercase tracking-widest border border-purple-700">
                Kirim Laporan RAT
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            
            <div class="bg-white border-2 border-slate-200 p-6 rounded-3xl shadow-md md:col-span-2 flex flex-col justify-between">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Status Keaktifan Lembaga</p>
                        <h3 class="text-2xl font-black text-slate-800 mt-1">Terverifikasi & Aktif</h3>
                    </div>
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold uppercase bg-emerald-50 text-emerald-700 border-2 border-emerald-200/60 shadow-sm">
                        Grade A
                    </span>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <span>Masa Berlaku Sertifikat: <strong class="text-slate-700">31 Des 2027</strong></span>
                    <a href="#" class="text-purple-600 font-bold hover:underline">Unduh Sertifikat Koperasi →</a>
                </div>
            </div>

            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md flex flex-col justify-between group">
                <div>
                    <div class="p-3 w-fit bg-purple-50 rounded-2xl text-purple-600 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-4">Laporan Buku Terakhir</p>
                    <h3 class="text-2xl font-black text-slate-800 mt-1">RAT Buku 2025</h3>
                </div>
                <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-200/60 w-fit mt-3">Sudah Valid</span>
            </div>
        </div>

        <div class="bg-white border-2 border-slate-200 rounded-[2rem] overflow-hidden shadow-lg shadow-slate-200/50">
            <div class="p-8 border-b-2 border-slate-200 bg-white">
                <h2 class="text-xl font-bold text-slate-800 tracking-tight">Riwayat Pengajuan & Pelaporan RAT</h2>
                <p class="text-sm text-slate-500">Pantau proses peninjauan berkas tahunan oleh tim dinas koperasi.</p>
            </div>

            <div class="overflow-x-auto p-4 bg-white">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b-2 border-slate-100">
                            <th class="px-6 py-4">Jenis Dokumen</th>
                            <th class="px-6 py-4">Tanggal Unggah</th>
                            <th class="px-6 py-4">Status Review</th>
                            <th class="px-6 py-4 text-right">Nota / Berkas</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y border-b border-slate-200 divide-slate-200/80">
                        <tr class="group hover:bg-slate-50/70 transition duration-200">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-purple-600 flex items-center justify-center text-white font-bold shadow-md shadow-purple-100">
                                        R
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-800">Laporan Pertanggungjawaban RAT 2025</div>
                                        <div class="text-[10px] font-bold text-slate-400 uppercase">Format: PDF (Signed)</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-xs font-bold text-slate-700">14 Mei 2026</span>
                            </td>
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-50 text-amber-700 border-2 border-amber-200/60 shadow-sm">
                                    Sedang Ditinjau
                                </span>
                            </td>
                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <button class="p-2 text-slate-400 hover:text-purple-600 hover:bg-purple-50 rounded-xl border border-transparent hover:border-purple-200 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection