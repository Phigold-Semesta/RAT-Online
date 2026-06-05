@extends('layouts.app')

@section('title', 'Tambah Jadwal RAT')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 animate-fade-in">

    {{-- HEADER --}}
    <div class="mb-8">
        <h1 class="text-2xl font-black text-slate-900 dark:text-white uppercase tracking-tight">Jadwal RAT Baru</h1>
        <p class="text-slate-500 text-sm mt-1">Input informasi pelaksanaan Rapat Anggota Tahunan koperasi Anda.</p>
    </div>

    {{-- FORM CREATION --}}
    <form action="{{ route('koperasi.rat.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-8 shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- TAHUN BUKU --}}
                <div>
                    <label for="tahun_buku" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tahun Buku</label>
                    <input type="number" name="tahun_buku" id="tahun_buku" value="{{ date('Y') }}" required
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950 p-3.5 rounded-xl border border-slate-200 dark:border-slate-800 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all">
                </div>

                {{-- TANGGAL PELAKSANAAN --}}
                <div>
                    <label for="tanggal" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tanggal Pelaksanaan</label>
                    <input type="date" name="tanggal" id="tanggal" required
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950 p-3.5 rounded-xl border border-slate-200 dark:border-slate-800 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all">
                </div>

                {{-- TEMPAT --}}
                <div class="md:col-span-2">
                    <label for="tempat" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tempat Pelaksanaan</label>
                    <input type="text" name="tempat" id="tempat" placeholder="Contoh: Gedung Aula Koperasi, Via Zoom Meeting" required
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950 p-3.5 rounded-xl border border-slate-200 dark:border-slate-800 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all">
                </div>

                {{-- STATUS --}}
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Status Jadwal</label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="terjadwal" checked class="text-emerald-600 focus:ring-emerald-500">
                            <span class="text-xs font-bold text-slate-600 dark:text-slate-400">Terjadwal</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="selesai" class="text-emerald-600 focus:ring-emerald-500">
                            <span class="text-xs font-bold text-slate-600 dark:text-slate-400">Telah Selesai</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        {{-- ACTIONS --}}
        <div class="flex items-center justify-end gap-4">
            <a href="{{ route('koperasi.rat.index') }}" class="px-6 py-3 rounded-xl text-xs font-bold tracking-widest uppercase text-slate-500 hover:text-slate-900 transition">Batal</a>
            <button type="submit" class="px-8 py-3 rounded-xl text-xs font-bold tracking-widest uppercase bg-emerald-600 hover:bg-emerald-700 text-white shadow-lg shadow-emerald-500/20 transition-all active:scale-95">
                Simpan Jadwal
            </button>
        </div>
    </form>
</div>

<style>
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in { animation: fadeIn 0.4s ease-out forwards; }
</style>
@endsection