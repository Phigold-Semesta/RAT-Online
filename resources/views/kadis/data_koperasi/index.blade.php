@extends('layouts.app')

@section('title', 'Data Koperasi')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-950 transition-colors duration-300 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-10">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="w-8 h-[2px] bg-emerald-500 rounded-full"></span>
                    <p class="text-[11px] font-bold text-emerald-600 dark:text-emerald-400 tracking-[0.2em] uppercase">Manajemen Data</p>
                </div>
                <h1 class="text-3xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-tight">Data Koperasi</h1>
            </div>
            <div class="flex gap-3">
                <button class="px-6 py-3 border-2 border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 text-xs font-bold rounded-2xl hover:bg-slate-100 dark:hover:bg-slate-800 transition uppercase tracking-widest">
                    Filter
                </button>
            </div>
        </div>

        {{-- TABLE SECTION --}}
        <div class="bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 rounded-[2rem] shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 dark:bg-slate-950/50">
                        <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                            <th class="px-8 py-6">Nama Koperasi</th>
                            <th class="px-6 py-6">Alamat</th>
                            <th class="px-6 py-6">Status</th>
                            <th class="px-8 py-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse($koperasis as $koperasi)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition">
                            <td class="px-8 py-6 font-bold text-slate-800 dark:text-slate-200">{{ $koperasi->nama_koperasi }}</td>
                            <td class="px-6 py-6 text-slate-600 dark:text-slate-400">{{ $koperasi->alamat }}</td>
                            <td class="px-6 py-6">
                                <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                    {{ $koperasi->status }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <a href="#" class="px-4 py-2 bg-slate-900 dark:bg-white text-white dark:text-slate-900 rounded-xl text-[10px] font-bold hover:bg-emerald-600 transition">DETAIL</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-8 py-10 text-center text-slate-400">Belum ada data koperasi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{-- PAGINATION --}}
            <div class="p-8 border-t-2 border-slate-200 dark:border-slate-800">
                {{ $koperasis->links() }}
            </div>
        </div>
    </div>
</div>
@endsection