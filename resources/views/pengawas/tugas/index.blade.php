@extends('layouts.app')

@section('title', 'Daftar Tugas Pengawasan RAT')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-900 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        {{-- HEADER SECTION --}}
        <div class="mb-10 pb-6 border-b-2 border-slate-200 dark:border-slate-700">
            <div class="flex items-center gap-2 mb-2">
                <span class="w-10 h-1 bg-amber-500 rounded-full"></span>
                <p class="text-[11px] font-black text-amber-600 tracking-[0.2em] uppercase">Panel Pengawas RAT</p>
            </div>
            <h1 class="text-4xl font-black text-slate-800 dark:text-white uppercase tracking-tight">
                Daftar <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-500">Tugas Koperasi</span>
            </h1>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2">Daftar entitas koperasi yang wajib ditinjau dalam agenda RAT Online.</p>
        </div>

        {{-- TABLE SECTION --}}
        <div class="bg-white dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-[2rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-900/50 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b-2 border-slate-100 dark:border-slate-700">
                            <th class="px-8 py-6">Koperasi Target</th>
                            <th class="px-8 py-6">Wilayah Operasional</th>
                            <th class="px-8 py-6">Status RAT</th>
                            <th class="px-8 py-6 text-right">Aksi Kerja</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @forelse($tugas as $item)
                        <tr class="group hover:bg-amber-50/50 dark:hover:bg-slate-700/30 transition duration-300">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-slate-800 dark:bg-slate-900 flex items-center justify-center text-white font-black shadow-lg">
                                        {{ substr($item->nama_koperasi, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-800 dark:text-white">{{ $item->nama_koperasi }}</div>
                                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Jenis: {{ $item->jenis_koperasi }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="text-xs font-bold text-slate-600 dark:text-slate-300">{{ $item->kecamatan }}</span>
                            </td>
                            <td class="px-8 py-6">
                                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest bg-amber-50 dark:bg-amber-900/20 text-amber-700 dark:text-amber-400 border border-amber-200 dark:border-amber-800 shadow-sm">
                                    {{ $item->status_koperasi }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <a href="{{ route('pengawas.tugas.form', $item->id_koperasi) }}" 
                                   class="inline-block px-6 py-3 bg-slate-800 hover:bg-amber-600 text-white font-black text-[10px] uppercase tracking-widest rounded-xl transition-all duration-300 shadow-lg hover:shadow-amber-500/30">
                                    Review RAT
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-20 text-slate-400 font-black uppercase tracking-widest">
                                Tidak ada agenda RAT yang tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            <div class="px-8 py-6 border-t-2 border-slate-100 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/50">
                {{ $tugas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection