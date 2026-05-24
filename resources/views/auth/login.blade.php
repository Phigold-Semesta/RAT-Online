@extends('layouts.app')

@section('title', 'Login Masuk')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center px-4 bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-950">
    
    <div class="w-full max-w-md bg-slate-900/60 backdrop-blur-2xl border border-teal-500/10 rounded-3xl p-8 md:p-10 shadow-[0_25px_50px_-12px_rgba(6,78,87,0.3)]">
        
        <div class="text-center mb-8">
            <p class="text-[10px] font-bold text-cyan-400 tracking-[0.2em] uppercase mb-1">
                DINAS KOPERASI DAN UMKM KARAWANG
            </p>
            <h1 class="text-3xl font-black tracking-widest bg-gradient-to-r from-cyan-400 via-teal-300 to-cyan-400 bg-clip-text text-transparent uppercase">
                RAT Online
            </h1>
            <div class="w-16 h-[2px] bg-gradient-to-r from-cyan-500 to-teal-500 mx-auto mt-4 rounded-full shadow-[0_0_12px_rgba(34,211,238,0.4)]"></div>
        </div>

        <div class="mb-8 text-center">
            <h2 class="text-base font-medium text-slate-200 tracking-wide">Halaman Login</h2>
            <p class="text-xs text-slate-400 mt-1">Silakan masukkan kredensial akun Anda untuk masuk</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 rounded-2xl bg-rose-950/30 border border-rose-500/20 text-rose-300 text-xs tracking-wide">
                <div class="font-semibold mb-1 flex items-center gap-2">
                    <span>⚠️ Mohon periksa kembali:</span>
                </div>
                <ul class="list-disc list-inside space-y-0.5 opacity-90">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="username" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2.5 px-1">
                    Username
                </label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required
                    class="w-full px-6 py-3.5 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 border border-transparent focus:border-teal-400/30 transition duration-300 placeholder:text-slate-400 text-sm" 
                    placeholder="Masukkan username">
            </div>

            <div>
                <label for="password" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2.5 px-1">
                    Password
                </label>
                <input type="password" id="password" name="password" required
                    class="w-full px-6 py-3.5 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 border border-transparent focus:border-teal-400/30 transition duration-300 placeholder:text-slate-400 text-sm" 
                    placeholder="••••••••">
            </div>

            <div class="pt-2">
                <button type="submit" 
                    class="w-full py-4 bg-gradient-to-r from-teal-900 to-cyan-900 hover:from-teal-800 hover:to-cyan-800 text-white font-bold rounded-full shadow-lg shadow-cyan-950/40 transition duration-300 hover:scale-[1.01] active:scale-[0.99] border border-teal-600/30 uppercase tracking-widest text-xs">
                    Masuk Ke Sistem
                </button>
            </div>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-800/40 text-center text-xs tracking-wide">
            <p class="text-slate-400/80">Koperasi Anda belum terdaftar di sistem?</p>
            <a href="{{ route('signup') }}" class="inline-block mt-2 font-bold text-cyan-400 hover:text-teal-300 transition duration-200 underline underline-offset-4">
                Registrasi Akun Koperasi Baru
            </a>
        </div>

    </div>
</div>
@endsection