@extends('layouts.app')

@section('title', 'Dashboard Pengawas Lapangan')

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-10 pb-6 border-b-2 border-slate-200">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="w-8 h-[2px] bg-amber-500 rounded-full"></span>
                    <p class="text-[11px] font-bold text-amber-600 tracking-[0.2em] uppercase">Tim Pengawas Koperasi Lapangan</p>
                </div>
                <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">
                    Panel <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-500">Pengawas Lapangan</span>
                </h1>
                <p class="text-sm text-slate-500 mt-1">Selamat datang, <span class="font-semibold text-slate-700">{{ auth()->user()->username }}</span>. Kelola agenda peninjauan fisik dan validasi kepatuhan koperasi.</p>
            </div>
            
            <div class="flex items-center gap-3 bg-white border-2 border-slate-200 px-5 py-3 rounded-2xl shadow-sm">
                <div class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-pulse"></div>
                <div class="flex flex-col">
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Beban Pengawasan</span>
                    <span class="text-xs font-bold text-slate-700">8 Agenda Pending</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            
            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md hover:shadow-lg hover:border-slate-300 transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-amber-50 rounded-2xl text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-lg border border-amber-200/60">Tugas Anda</span>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Belum Diawasi</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">8</h3>
            </div>

            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md hover:shadow-lg hover:border-slate-300 transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-blue-50 rounded-2xl text-blue-600 group-hover:bg-blue-500 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Kunjungan Lapangan</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">5</h3>
            </div>

            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md hover:shadow-lg hover:border-slate-300 transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-emerald-50 rounded-2xl text-emerald-600 group-hover:bg-emerald-500 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-200/60">Bulan Ini</span>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Selesai Diinspeksi</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">42</h3>
            </div>

            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md hover:shadow-lg hover:border-slate-300 transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-rose-50 rounded-2xl text-rose-600 group-hover:bg-rose-500 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Koperasi Bermasalah</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">3</h3>
            </div>
        </div>

        <div class="bg-white border-2 border-slate-200 rounded-[2rem] overflow-hidden shadow-lg shadow-slate-200/50">
            <div class="p-8 border-b-2 border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white">
                <div>
                    <h2 class="text-xl font-bold text-slate-800 tracking-tight">Daftar Agenda Pengawasan Koperasi</h2>
                    <p class="text-sm text-slate-500">Daftar entitas koperasi wilayah Karawang yang wajib ditinjau kepatuhannya.</p>
                </div>
            </div>

            <div class="overflow-x-auto p-4 bg-white">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b-2 border-slate-100">
                            <th class="px-6 py-4">Koperasi Target</th>
                            <th class="px-6 py-4">Wilayah Operasional</th>
                            <th class="px-6 py-4">Status Kepatuhan</th>
                            <th class="px-6 py-4 text-right">Aksi Kerja</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y border-b border-slate-200 divide-slate-200/80">
                        <tr class="group hover:bg-slate-50/80 transition duration-200">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-amber-600 flex items-center justify-center text-white font-bold shadow-md shadow-amber-100">
                                        S
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-800">KSP Sumber Rejeki Klari</div>
                                        <div class="text-[10px] font-bold text-slate-400 uppercase">Jenis: Simpan Pinjam</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-xs font-bold text-slate-700">Kecamatan Klari</span>
                            </td>
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-blue-50 text-blue-700 border-2 border-blue-200/60 shadow-sm">
                                    Butuh Inspeksi Fisik
                                </span>
                            </td>
                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <button class="px-4 py-2 text-xs font-bold bg-slate-100 text-slate-700 border border-slate-300 rounded-xl hover:bg-amber-500 hover:text-white hover:border-amber-500 transition shadow-sm">
                                        Mulai Pengawasan
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