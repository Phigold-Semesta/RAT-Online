@extends('layouts.app')

@section('title', 'Tambah Penilaian Kesehatan')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 animate-fade-in">

    {{-- HEADER --}}
    <div class="mb-8">
        <h1 class="text-2xl font-black text-slate-900 dark:text-white uppercase tracking-tight">Tambah Penilaian</h1>
        <p class="text-slate-500 text-sm mt-1">Input data penilaian kesehatan baru untuk koperasi Anda.</p>
    </div>

    {{-- FORM CREATION --}}
    <form action="{{ route('koperasi.pemkes.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-8 shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- TAHUN --}}
                <div>
                    <label for="tahun" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tahun Penilaian</label>
                    <input type="number" name="tahun" id="tahun" value="{{ date('Y') }}" required
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950 p-3.5 rounded-xl border border-slate-200 dark:border-slate-800 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all">
                </div>

                {{-- SKOR --}}
                <div>
                    <label for="skor" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Skor Penilaian</label>
                    <input type="number" step="0.01" name="skor" id="skor" required
                           class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950 p-3.5 rounded-xl border border-slate-200 dark:border-slate-800 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all">
                </div>

                {{-- PREDIKAT --}}
                <div class="md:col-span-2">
                    <label for="predikat" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Predikat</label>
                    <select name="predikat" id="predikat" required
                            class="w-full text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-950 p-3.5 rounded-xl border border-slate-200 dark:border-slate-800 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all">
                        <option value="Sangat Sehat">Sangat Sehat</option>
                        <option value="Sehat">Sehat</option>
                        <option value="Cukup Sehat">Cukup Sehat</option>
                        <option value="Dalam Pengawasan">Dalam Pengawasan</option>
                    </select>
                </div>

                {{-- STATUS --}}
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Status Data</label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="draf" checked class="text-emerald-600 focus:ring-emerald-500">
                            <span class="text-xs font-bold text-slate-600 dark:text-slate-400">Simpan sebagai Draf</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="final" class="text-emerald-600 focus:ring-emerald-500">
                            <span class="text-xs font-bold text-slate-600 dark:text-slate-400">Langsung Final</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        {{-- ACTIONS --}}
        <div class="flex items-center justify-end gap-4">
            <a href="{{ route('koperasi.pemkes.index') }}" class="px-6 py-3 rounded-xl text-xs font-bold tracking-widest uppercase text-slate-500 hover:text-slate-900 transition">Batal</a>
            <button type="submit" class="px-8 py-3 rounded-xl text-xs font-bold tracking-widest uppercase bg-emerald-600 hover:bg-emerald-700 text-white shadow-lg shadow-emerald-500/20 transition-all active:scale-95">
                Simpan Data
            </button>
        </div>
    </form>
</div>

<style>
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in { animation: fadeIn 0.4s ease-out forwards; }
</style>
@endsection