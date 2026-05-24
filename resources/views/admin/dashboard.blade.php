@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-10 pb-6 border-b-2 border-slate-200">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="w-8 h-[2px] bg-teal-500 rounded-full"></span>
                    <p class="text-[11px] font-bold text-teal-600 tracking-[0.2em] uppercase">Panel Kontrol Internal</p>
                </div>
                <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">
                    Dashboard <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-500">Administrator</span>
                </h1>
                <p class="text-sm text-slate-500 mt-1">Selamat datang, <span class="font-semibold text-slate-700">{{ auth()->user()->username }}</span>. Kelola data pelaporan koperasi Karawang.</p>
            </div>
            
            <div class="flex items-center gap-3 bg-white border-2 border-slate-200 px-5 py-3 rounded-2xl shadow-sm">
                <div class="relative">
                    <div class="w-2.5 h-2.5 rounded-full bg-emerald-500"></div>
                    <div class="absolute inset-0 w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></div>
                </div>
                <div class="flex flex-col">
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Status Server</span>
                    <span class="text-xs font-bold text-slate-700">Terhubung & Aktif</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            
            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md hover:shadow-lg hover:border-slate-300 transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-teal-50 rounded-2xl text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-200/60">+12%</span>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Koperasi</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">1,248</h3>
            </div>

            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md hover:shadow-lg hover:border-slate-300 transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-amber-50 rounded-2xl text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.042m0 0L12 21.355r2.263-2.263a11.955 11.955 0 01-4.526 0L12 21.355z" />
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-lg border border-amber-200/60">Penting</span>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Butuh Verifikasi</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">14</h3>
            </div>

            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md hover:shadow-lg hover:border-slate-300 transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-cyan-50 rounded-2xl text-cyan-600 group-hover:bg-cyan-500 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Sudah Lapor RAT</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">412</h3>
            </div>

            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md hover:shadow-lg hover:border-slate-300 transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-rose-50 rounded-2xl text-rose-600 group-hover:bg-rose-500 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Belum Lapor RAT</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">836</h3>
            </div>
        </div>

        <div class="bg-white border-2 border-slate-200 rounded-[2rem] overflow-hidden shadow-lg shadow-slate-200/50">
            
            <div class="p-8 border-b-2 border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white">
                <div>
                    <h2 class="text-xl font-bold text-slate-800 tracking-tight">Antrean Pendaftaran Koperasi</h2>
                    <p class="text-sm text-slate-500">Validasi pengajuan akun mandiri dari koperasi wilayah Karawang.</p>
                </div>
                <button class="px-6 py-2.5 bg-slate-100 hover:bg-teal-600 hover:text-white text-slate-600 text-xs font-bold rounded-full transition duration-300 uppercase tracking-widest border border-slate-300/70 shadow-sm">
                    Manajemen Data
                </button>
            </div>

            <div class="overflow-x-auto p-4 bg-white">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b-2 border-slate-100">
                            <th class="px-6 py-4">Koperasi</th>
                            <th class="px-6 py-4">Wilayah</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y border-b border-slate-200 divide-slate-200/80">
                        
                        <tr class="group hover:bg-slate-50/80 transition duration-200">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-teal-600 flex items-center justify-center text-white font-bold shadow-md shadow-teal-100">
                                        M
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-800">Koperasi Maju Bersama Sukaseuri</div>
                                        <div class="text-[10px] font-bold text-slate-400 uppercase">Ketua: Edi Suwarno</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-xs font-bold text-slate-700">Kotabaru</span>
                            </td>
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-50 text-amber-700 border-2 border-amber-200/60 shadow-sm">
                                    Menunggu
                                </span>
                            </td>
                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <button class="p-2 text-slate-400 hover:text-teal-600 hover:bg-teal-50 rounded-xl border border-transparent hover:border-teal-200 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <button class="p-2 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl border border-transparent hover:border-emerald-200 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="group hover:bg-slate-50/80 transition duration-200">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-cyan-600 flex items-center justify-center text-white font-bold shadow-md shadow-cyan-100">
                                        K
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-800">KUD Karawang Timur</div>
                                        <div class="text-[10px] font-bold text-slate-400 uppercase">Ketua: H. Mulyana</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-xs font-bold text-slate-700">Karawang Timur</span>
                            </td>
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-700 border-2 border-emerald-200/60 shadow-sm">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <button class="p-2 text-slate-400 hover:text-teal-600 hover:bg-teal-50 rounded-xl border border-transparent hover:border-teal-200 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
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