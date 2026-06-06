@extends('layouts.app')

@section('title', 'Daftar Laporan Validasi')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-950 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10">
            <h1 class="text-3xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-tight">Monitoring Laporan</h1>
            <p class="text-slate-400 text-sm font-bold mt-2">Daftar lengkap laporan koperasi dan status validasinya.</p>
        </div>

        <div class="bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 rounded-[2rem] shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-slate-50 dark:bg-slate-950/50">
                    <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                        <th class="px-8 py-6">ID Laporan</th>
                        <th class="px-6 py-6">Jenis Laporan</th>
                        <th class="px-6 py-6">Tanggal</th>
                        <th class="px-6 py-6">Status</th>
                        <th class="px-8 py-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($laporans as $laporan)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition">
                        <td class="px-8 py-6 font-bold text-slate-800 dark:text-slate-200">#{{ $laporan->id_laporan }}</td>
                        <td class="px-6 py-6 text-slate-600 dark:text-slate-400">{{ $laporan->jenis_laporan }}</td>
                        <td class="px-6 py-6 text-slate-600 dark:text-slate-400">{{ $laporan->tanggal_laporan }}</td>
                        <td class="px-6 py-6">
                            {{-- Badge Status Warna-Warni --}}
                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider
                                {{ $laporan->status_laporan == 'disahkan' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : '' }}
                                {{ $laporan->status_laporan == 'proses' ? 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400' : '' }}
                                {{ $laporan->status_laporan == 'draft' ? 'bg-slate-200 text-slate-600 dark:bg-slate-800 dark:text-slate-400' : '' }}">
                                {{ $laporan->status_laporan }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            @if($laporan->status_laporan == 'proses')
                                <a href="{{ route('kadis.laporan.validasi.form', $laporan->id_laporan) }}" 
                                   class="px-6 py-3 bg-slate-900 text-white rounded-2xl text-[10px] font-bold hover:bg-emerald-600 transition">VALIDASI</a>
                            @else
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="px-8 py-10 text-center text-slate-400">Tidak ada data laporan.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-8 border-t-2 border-slate-200 dark:border-slate-800">{{ $laporans->links() }}</div>
        </div>
    </div>
</div>
@endsection