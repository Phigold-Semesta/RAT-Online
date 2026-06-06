@extends('layouts.app')

@section('title', 'Validasi Laporan')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-950 py-10">
    <div class="max-w-3xl mx-auto px-4">
        <div class="bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 p-8 rounded-[2rem] shadow-sm">
            <h2 class="text-2xl font-black text-slate-800 mb-6 uppercase">Validasi Laporan #{{ $laporan->id_laporan }}</h2>
            
            <form action="{{ route('kadis.laporan.proses', $laporan->id_laporan) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-6">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Keputusan Validasi</label>
                    <select name="status_laporan" class="w-full p-4 bg-slate-50 border-2 border-slate-200 rounded-2xl font-bold text-slate-800">
                        <option value="disahkan">SETUJUI & SAHKAN</option>
                        <option value="proses">REVISI (KEMBALIKAN KE PROSES)</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Catatan Revisi</label>
                    <textarea name="catatan_revisi" rows="4" class="w-full p-4 bg-slate-50 border-2 border-slate-200 rounded-2xl font-bold text-slate-800" placeholder="Tulis catatan jika ada revisi..."></textarea>
                </div>

                <button type="submit" class="w-full py-4 bg-emerald-600 text-white font-black rounded-2xl hover:bg-emerald-700 transition uppercase tracking-widest">
                    SIMPAN KEPUTUSAN
                </button>
            </form>
        </div>
    </div>
</div>
@endsection