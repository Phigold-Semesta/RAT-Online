@extends('layouts.app')

@section('title', 'Dashboard Kepala Dinas')

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-10 pb-6 border-b-2 border-slate-200">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="w-8 h-[2px] bg-emerald-500 rounded-full"></span>
                    <p class="text-[11px] font-bold text-emerald-600 tracking-[0.2em] uppercase">Eksekutif Pembuat Kebijakan</p>
                </div>
                <h1 class="text-3xl font-black text-slate-800 tracking-tight uppercase">
                    Panel <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500">Kepala Dinas</span>
                </h1>
                <p class="text-sm text-slate-500 mt-1">Selamat datang, <span class="font-semibold text-slate-700">{{ auth()->user()->username }}</span>. Pantau grafik perkembangan dan sahkan kebijakan koperasi daerah.</p>
            </div>
            
            <button class="px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white text-xs font-bold rounded-2xl shadow-md shadow-emerald-200 transition duration-300 uppercase tracking-widest border border-emerald-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Ekspor Laporan Tahunan
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            
            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md hover:shadow-lg hover:border-slate-300 transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-emerald-50 rounded-2xl text-emerald-600 group-hover:bg-emerald-500 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-200/60">Karawang</span>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Koperasi Aktif</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">342</h3>
            </div>

            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md hover:shadow-lg hover:border-slate-300 transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-amber-50 rounded-2xl text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-lg border border-amber-200/60">Butuh Atensi</span>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Persetujuan Sertifikat</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">12</h3>
            </div>

            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md hover:shadow-lg hover:border-slate-300 transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-blue-50 rounded-2xl text-blue-600 group-hover:bg-blue-500 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold text-blue-700 bg-blue-50 px-2.5 py-1 rounded-lg border border-blue-200/60">Tahun Buku 2025</span>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Sudah Lapor RAT</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">198</h3>
            </div>

            <div class="bg-white border-2 border-slate-200/90 p-6 rounded-3xl shadow-md hover:shadow-lg hover:border-slate-300 transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-purple-50 rounded-2xl text-purple-600 group-hover:bg-purple-500 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.114-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Akumulasi Anggota</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">14.5K</h3>
            </div>
        </div>

        <div class="bg-white border-2 border-slate-200 rounded-[2rem] overflow-hidden shadow-lg shadow-slate-200/50">
            <div class="p-8 border-b-2 border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white">
                <div>
                    <h2 class="text-xl font-bold text-slate-800 tracking-tight">E-Sign Persetujuan Sertifikat Koperasi</h2>
                    <p class="text-sm text-slate-500">Daftar legalitas koperasi berkasnya yang telah lolos verifikasi administrasi dan pengawasan lapangan.</p>
                </div>
            </div>

            <div class="overflow-x-auto p-4 bg-white">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b-2 border-slate-100">
                            <th class="px-6 py-4">Nama Koperasi</th>
                            <th class="px-6 py-4">Hasil Evaluasi Lapangan</th>
                            <th class="px-6 py-4">Status Rekomendasi</th>
                            <th class="px-6 py-4 text-right">Otorisasi Surat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y border-b border-slate-200 divide-slate-200/80">
                        <tr class="group hover:bg-slate-50/80 transition duration-200">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-emerald-600 flex items-center justify-center text-white font-bold shadow-md shadow-emerald-100">
                                        P
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-800">KUD Panca Motor Telukjambe</div>
                                        <div class="text-[10px] font-bold text-slate-400 uppercase">No Reg: 3215.2026.001</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-xs font-semibold text-slate-600 block">Kepatuhan Fisik: <strong class="text-emerald-600">98%</strong></span>
                                <span class="text-[10px] text-slate-400">Diperiksa oleh Pengawas Lapangan</span>
                            </td>
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-700 border-2 border-emerald-200/60 shadow-sm">
                                    Siap Cetak SK
                                </span>
                            </td>
                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <button class="px-4 py-2 text-xs font-bold bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition shadow-md shadow-emerald-100 tracking-wider uppercase">
                                        Tanda Tangan Elektronik
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