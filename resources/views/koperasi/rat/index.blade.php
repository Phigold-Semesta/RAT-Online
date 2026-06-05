@extends('layouts.app')

@section('title', 'Pelaksanaan RAT')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 animate-fade-in">

    {{-- HEADER & STATS --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
        <div>
            <h1 class="text-2xl font-black text-slate-900 dark:text-white uppercase tracking-tight">Pelaksanaan RAT</h1>
            <p class="text-slate-500 text-sm mt-1">Kelola data dan dokumen Rapat Anggota Tahunan koperasi Anda.</p>
        </div>
        
        <a href="{{ route('koperasi.rat.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-xs font-bold tracking-widest uppercase bg-emerald-600 hover:bg-emerald-700 text-white shadow-lg shadow-emerald-500/20 transition-all duration-300 active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Jadwal RAT
        </a>
    </div>

    {{-- TABEL DATA RAT --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-950/50 border-b border-slate-200 dark:border-slate-800">
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Tahun Buku</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Tanggal Pelaksanaan</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Tempat</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($rats ?? [] as $item)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors duration-200">
                            <td class="px-6 py-5 text-sm font-bold text-slate-800 dark:text-slate-200">{{ $item->tahun_buku }}</td>
                            <td class="px-6 py-5 text-sm font-semibold text-slate-600 dark:text-slate-400">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                            <td class="px-6 py-5 text-sm font-semibold text-slate-600 dark:text-slate-400">{{ $item->tempat }}</td>
                            <td class="px-6 py-5">
                                @if($item->status == 'selesai')
                                    <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Selesai</span>
                                @else
                                    <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400">Terjadwal</span>
                                @endif
                            </td>
                            <td class="px-6 py-5 text-right">
                                <a href="{{ route('koperasi.rat.edit', $item->id) }}" class="text-emerald-600 dark:text-emerald-400 font-bold text-xs uppercase tracking-wider hover:underline">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-slate-400 text-xs uppercase font-bold tracking-widest">
                                Belum ada data pelaksanaan RAT yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- PAGINATION --}}
        @if(isset($rats) && $rats->hasPages())
            <div class="px-6 py-4 border-t border-slate-200 dark:border-slate-800">
                {{ $rats->links() }}
            </div>
        @endif
    </div>

</div>

<style>
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in { animation: fadeIn 0.4s ease-out forwards; }
</style>
@endsection