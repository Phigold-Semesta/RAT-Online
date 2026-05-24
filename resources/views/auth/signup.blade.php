@extends('layouts.app')

@section('title', 'Pendaftaran Koperasi Baru')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center px-4 py-12 bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-950">
    
    <div class="w-full max-w-3xl bg-slate-900/60 backdrop-blur-2xl border border-teal-500/10 rounded-3xl p-8 md:p-10 shadow-[0_25px_50px_-12px_rgba(6,78,87,0.3)]">
        
        <div class="text-center mb-10">
            <p class="text-[10px] font-bold text-cyan-400 tracking-[0.2em] uppercase mb-1">
                DINAS KOPERASI DAN UMKM KARAWANG
            </p>
            <h1 class="text-3xl font-black tracking-widest bg-gradient-to-r from-cyan-400 via-teal-300 to-cyan-400 bg-clip-text text-transparent uppercase">
                Registrasi Koperasi
            </h1>
            <p class="text-xs text-slate-400 mt-2">Formulir Pendaftaran Mandiri Anggota Koperasi Eksternal</p>
            <div class="w-16 h-[2px] bg-gradient-to-r from-cyan-500 to-teal-500 mx-auto mt-4 rounded-full shadow-[0_0_12px_rgba(34,211,238,0.4)]"></div>
        </div>

        @if ($errors->any())
            <div class="mb-8 p-5 rounded-2xl bg-rose-950/30 border border-rose-500/20 text-rose-300 text-xs tracking-wide">
                <div class="font-semibold mb-2 flex items-center gap-2">
                    <span>⚠️ Mohon lengkapi data berikut dengan benar:</span>
                </div>
                <ul class="list-disc list-inside space-y-1 opacity-90">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('signup') }}" method="POST" class="space-y-10">
            @csrf

            <div class="space-y-5">
                <div class="flex items-center gap-3 border-b border-slate-800/60 pb-2">
                    <span class="text-xs font-bold text-cyan-400 bg-cyan-950/60 border border-cyan-500/30 px-2.5 py-1 rounded-md">I</span>
                    <h3 class="text-xs font-bold text-slate-200 uppercase tracking-widest">Kredensial Akun Login</h3>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="username" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" required
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="Username akun">
                    </div>
                    <div>
                        <label for="email" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Email Resmi Koperasi</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="contoh@koperasi.com">
                    </div>
                    <div>
                        <label for="password" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Password</label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="Minimal 8 karakter">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="Ulangi password">
                    </div>
                </div>
            </div>

            <div class="space-y-5">
                <div class="flex items-center gap-3 border-b border-slate-800/60 pb-2">
                    <span class="text-xs font-bold text-cyan-400 bg-cyan-950/60 border border-cyan-500/30 px-2.5 py-1 rounded-md">II</span>
                    <h3 class="text-xs font-bold text-slate-200 uppercase tracking-widest">Detail Lembaga Koperasi</h3>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="md:col-span-2">
                        <label for="nama_koperasi" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Nama Koperasi</label>
                        <input type="text" id="nama_koperasi" name="nama_koperasi" value="{{ old('nama_koperasi') }}" required
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="Nama resmi sesuai Akta Notaris / Badan Hukum">
                    </div>
                    <div>
                        <label for="jenis_koperasi" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Jenis Koperasi</label>
                        <input type="text" id="jenis_koperasi" name="jenis_koperasi" value="{{ old('jenis_koperasi') }}" required
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="Misal: Simpan Pinjam, Produsen, Jasa">
                    </div>
                    <div>
                        <label for="no_telp" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">No. Telepon / Kontak Pengurus</label>
                        <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="Contoh: 08123456xxxx">
                    </div>
                    <div>
                        <label for="kecamatan" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Kecamatan (Wilayah Karawang)</label>
                        <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}" required
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="Masukkan wilayah kecamatan">
                    </div>
                    <div>
                        <label for="tanggal_berdiri" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Tanggal Berdiri Koperasi</label>
                        <input type="date" id="tanggal_berdiri" name="tanggal_berdiri" value="{{ old('tanggal_berdiri') }}" required
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 text-slate-900 text-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label for="alamat" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Alamat Kantor Lengkap</label>
                        <textarea id="alamat" name="alamat" rows="3" required
                            class="w-full px-6 py-4 bg-white text-slate-900 rounded-3xl font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="Nama jalan, nomor, RT/RW, Desa/Kelurahan..."></textarea>
                    </div>
                </div>
            </div>

            <div class="space-y-5">
                <div class="flex items-center gap-3 border-b border-slate-800/60 pb-2">
                    <span class="text-xs font-bold text-cyan-400 bg-cyan-950/60 border border-cyan-500/30 px-2.5 py-1 rounded-md">III</span>
                    <h3 class="text-xs font-bold text-slate-200 uppercase tracking-widest">Struktur Internal & Keanggotaan</h3>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="ketua_koperasi" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Nama Ketua Koperasi</label>
                        <input type="text" id="ketua_koperasi" name="ketua_koperasi" value="{{ old('ketua_koperasi') }}" required
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="Nama lengkap ketua">
                    </div>
                    <div>
                        <label for="sekertaris_koperasi" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Nama Sekretaris Koperasi</label>
                        <input type="text" id="sekertaris_koperasi" name="sekertaris_koperasi" value="{{ old('sekertaris_koperasi') }}" required
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="Nama lengkap sekretaris">
                    </div>
                    <div>
                        <label for="bendahara_koperasi" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Nama Bendahara Koperasi</label>
                        <input type="text" id="bendahara_koperasi" name="bendahara_koperasi" value="{{ old('bendahara_koperasi') }}" required
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="Nama lengkap bendahara">
                    </div>
                    <div>
                        <label for="jumlah_anggota" class="block text-[11px] font-bold text-teal-400/90 uppercase tracking-widest mb-2 px-1">Jumlah Anggota Aktif</label>
                        <input type="number" id="jumlah_anggota" name="jumlah_anggota" value="{{ old('jumlah_anggota') }}" required min="1"
                            class="w-full px-5 py-3 bg-white text-slate-900 rounded-full font-semibold focus:outline-none focus:ring-4 focus:ring-cyan-500/20 transition duration-300 placeholder:text-slate-400 text-sm" 
                            placeholder="Total perorangan">
                    </div>
                </div>
            </div>

            <div class="pt-6 space-y-4">
                <button type="submit" 
                    class="w-full py-4 bg-gradient-to-r from-teal-900 to-cyan-900 hover:from-teal-800 hover:to-cyan-800 text-white font-bold rounded-full shadow-lg shadow-cyan-950/40 transition duration-300 hover:scale-[1.01] active:scale-[0.99] border border-teal-600/30 uppercase tracking-widest text-xs">
                    Ajukan Pendaftaran Koperasi
                </button>
                
                <div class="text-center text-xs tracking-wide text-slate-400 pt-2">
                    Sudah terdaftar sebelumnya? 
                    <a href="{{ route('login') }}" class="font-bold text-cyan-400 hover:text-teal-300 transition duration-200 underline underline-offset-4">
                        Kembali ke Halaman Login
                    </a>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection