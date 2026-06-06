@extends('layouts.app')

@section('title', 'Riwayat Pemeriksaan Pengawas')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-900 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        {{-- HEADER --}}
        <div class="mb-10">
            <h1 class="text-4xl font-black text-slate-800 dark:text-white uppercase tracking-tight">
                Riwayat <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-500">Pemeriksaan</span>
            </h1>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2">Daftar laporan hasil verifikasi yang telah Anda selesaikan.</p>
        </div>

        {{-- TABLE CARD --}}
        <div class="bg-white dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-[2rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-900/50 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b-2 border-slate-100 dark:border-slate-700">
                            <th class="px-8 py-6">Koperasi</th>
                            <th class="px-8 py-6">Catatan Singkat</th>
                            <th class="px-8 py-6">Status Laporan</th>
                            <th class="px-8 py-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @forelse($riwayat as $item)
                        <tr class="group hover:bg-slate-50 dark:hover:bg-slate-700/30 transition duration-300">
                            <td class="px-8 py-6">
                                <div class="text-sm font-bold text-slate-800 dark:text-white">{{ $item->koperasi->nama_koperasi ?? 'N/A' }}</div>
                                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">{{ $item->created_at->format('d M Y') }}</div>
                            </td>
                            <td class="px-8 py-6 max-w-xs truncate text-sm text-slate-600 dark:text-slate-300">
                                {{ Str::limit($item->catatan_revisi, 50) }}
                            </td>
                            <td class="px-8 py-6">
                                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                                    {{ $item->status_laporan }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-2">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('pengawas.riwayat.edit', $item->id) }}" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition">
                                        Edit
                                    </a>
                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('pengawas.riwayat.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus riwayat ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-20 text-slate-400 font-black uppercase tracking-widest">
                                Belum ada riwayat pemeriksaan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            <div class="px-8 py-6 border-t-2 border-slate-100 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/50">
                {{ $riwayat->links() }}
            </div>
        </div>
    </div>
</div>
@endsection