@extends('layouts.app')

@section('title', 'Review RAT - ' . $koperasi->nama_koperasi)

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-900 py-10 transition-colors duration-300">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- BACK BUTTON --}}
        <a href="{{ route('pengawas.tugas.index') }}" class="inline-flex items-center text-amber-600 font-black uppercase tracking-[0.2em] text-[10px] mb-8 hover:text-slate-800 transition">
            ← Kembali ke Daftar Tugas
        </a>

        {{-- MAIN CARD --}}
        <div class="bg-white dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-[2rem] shadow-2xl overflow-hidden">
            
            {{-- HEADER KOPERASI --}}
            <div class="p-8 border-b-2 border-slate-100 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/50">
                <div class="flex items-center gap-6">
                    <div class="w-20 h-20 rounded-3xl bg-slate-800 flex items-center justify-center text-white text-3xl font-black shadow-lg">
                        {{ substr($koperasi->nama_koperasi, 0, 1) }}
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-slate-800 dark:text-white uppercase">{{ $koperasi->nama_koperasi }}</h1>
                        <p class="text-sm text-slate-500 font-bold tracking-widest uppercase">{{ $koperasi->jenis_koperasi }} | {{ $koperasi->kecamatan }}</p>
                    </div>
                </div>
            </div>

            {{-- FORM SECTION --}}
            <form action="#" method="POST" class="p-8 space-y-8">
                @csrf
                
                {{-- DATA GRID --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">No. Badan Hukum</label>
                        <div class="p-4 bg-slate-50 dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-700 text-sm font-bold text-slate-700 dark:text-slate-200">
                            {{ $koperasi->no_badan_hukum }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Status RAT</label>
                        <div class="p-4 bg-amber-50 dark:bg-amber-900/20 rounded-xl border border-amber-200 dark:border-amber-800 text-sm font-bold text-amber-700 dark:text-amber-400">
                            {{ $koperasi->status_koperasi }}
                        </div>
                    </div>
                </div>

                {{-- INPUT AREA --}}
                <div class="space-y-4">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Catatan Pengawas</label>
                    <textarea name="catatan" rows="4" class="w-full p-4 bg-slate-50 dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-amber-500 transition outline-none font-bold text-slate-700 dark:text-slate-200" placeholder="Masukkan hasil verifikasi atau catatan revisi di sini..."></textarea>
                </div>

                <div class="flex items-center gap-4 pt-4 border-t-2 border-slate-100 dark:border-slate-700">
                    <button type="submit" class="flex-1 px-8 py-4 bg-amber-600 hover:bg-amber-700 text-white font-black text-xs uppercase tracking-widest rounded-xl transition shadow-lg hover:shadow-amber-500/30">
                        Simpan Verifikasi
                    </button>
                    <button type="button" class="px-8 py-4 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-black text-xs uppercase tracking-widest rounded-xl hover:bg-slate-200 transition">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection