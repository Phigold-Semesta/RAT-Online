@extends('layouts.app')

@section('title', 'Data Penilaian Kesehatan')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 animate-fade-in">

    {{-- HEADER & STATS --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
        <div>
            <h1 class="text-2xl font-black text-slate-900 dark:text-white uppercase tracking-tight">Penilaian Kesehatan</h1>
            <p class="text-slate-500 text-sm mt-1">Kelola dan pantau status kesehatan koperasi Anda secara berkala.</p>
        </div>
        
        <a href="{{ route('koperasi.pemkes.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-xs font-bold tracking-widest uppercase bg-emerald-600 hover:bg-emerald-700 text-white shadow-lg shadow-emerald-500/20 transition-all duration-300 active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Penilaian
        </a>
    </div>

    {{-- TABEL DATA PEMKES --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-950/50 border-b border-slate-200 dark:border-slate-800">
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Tahun</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Skor</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Predikat</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    {{-- Pastikan $pemkes ada dan tidak null --}}
                    @forelse($pemkes ?? [] as $item)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors duration-200">
                            <td class="px-6 py-5 text-sm font-bold text-slate-800 dark:text-slate-200">{{ $item->tahun ?? '-' }}</td>
                            <td class="px-6 py-5 text-sm font-semibold text-slate-600 dark:text-slate-400">{{ $item->skor ?? '0' }}</td>
                            <td class="px-6 py-5">
                                <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-wider bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">
                                    {{ $item->predikat ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-5">
                                @if(isset($item->status) && $item->status == 'final')
                                    <span class="text-xs font-bold text-emerald-500 flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Final
                                    </span>
                                @else
                                    <span class="text-xs font-bold text-amber-500 flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Draf
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-5 text-right">
                                <a href="{{ route('koperasi.pemkes.edit', $item->id) }}" class="text-emerald-600 dark:text-emerald-400 font-bold text-xs uppercase tracking-wider hover:underline">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-slate-400 text-xs uppercase font-bold tracking-widest">
                                Belum ada data penilaian kesehatan yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- PAGINATION --}}
        @if(isset($pemkes) && $pemkes->hasPages())
            <div class="px-6 py-4 border-t border-slate-200 dark:border-slate-800">
                {{ $pemkes->links() }}
            </div>
        @endif
    </div>
</div>
@endsection