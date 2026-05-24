<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'RAT Online') - Dinas Koperasi</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="h-full text-slate-100 antialiased selection:bg-teal-500 selection:text-slate-950">

    @auth
    <nav class="sticky top-0 z-40 w-full bg-slate-900/60 backdrop-blur-md border-b border-teal-500/10 shadow-[0_4px_30px_rgba(0,0,0,0.3)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 bg-gradient-to-r from-cyan-500 to-teal-500 p-2 rounded-xl shadow-[0_0_10px_rgba(20,184,166,0.3)]">
                        <span class="text-xs font-black text-white tracking-wider">RAT</span>
                    </div>
                    <div class="hidden sm:block">
                        <span class="text-sm font-bold tracking-wider uppercase text-slate-200">RAT <span class="text-cyan-400">Online</span></span>
                        <p class="text-[9px] font-medium text-slate-400 tracking-wider">DISKOP UMKM KARAWANG</p>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-1">
                    
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('admin.dashboard') ? 'bg-cyan-950 text-cyan-400 border border-cyan-500/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
                            Dashboard
                        </a>
                        <a href="#" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase text-slate-400 hover:text-slate-200 hover:bg-slate-800/50 transition">
                            Validasi Koperasi
                        </a>
                        <a href="#" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase text-slate-400 hover:text-slate-200 hover:bg-slate-800/50 transition">
                            Kelola User
                        </a>
                    @endif

                    @if(auth()->user()->role === 'koperasi')
                        <a href="{{ route('koperasi.dashboard') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('koperasi.dashboard') ? 'bg-cyan-950 text-cyan-400 border border-cyan-500/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
                            Dashboard
                        </a>
                        <a href="#" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase text-slate-400 hover:text-slate-200 hover:bg-slate-800/50 transition">
                            Input Laporan RAT
                        </a>
                        <a href="#" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase text-slate-400 hover:text-slate-200 hover:bg-slate-800/50 transition">
                            Profil Koperasi
                        </a>
                    @endif

                    @if(auth()->user()->role === 'pengawas')
                        <a href="{{ route('pengawas.dashboard') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('pengawas.dashboard') ? 'bg-cyan-950 text-cyan-400 border border-cyan-500/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
                            Dashboard
                        </a>
                        <a href="#" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase text-slate-400 hover:text-slate-200 hover:bg-slate-800/50 transition">
                            Pemeriksaan
                        </a>
                        <a href="#" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase text-slate-400 hover:text-slate-200 hover:bg-slate-800/50 transition">
                            Rekomendasi
                        </a>
                    @endif

                    @if(auth()->user()->role === 'kadis')
                        <a href="{{ route('kadis.dashboard') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('kadis.dashboard') ? 'bg-cyan-950 text-cyan-400 border border-cyan-500/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
                            Dashboard
                        </a>
                        <a href="#" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase text-slate-400 hover:text-slate-200 hover:bg-slate-800/50 transition">
                            Grafik Monitoring
                        </a>
                        <a href="#" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase text-slate-400 hover:text-slate-200 hover:bg-slate-800/50 transition">
                            Laporan Akhir
                        </a>
                    @endif

                </div>

                <div class="flex items-center gap-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs font-bold text-slate-200">{{ auth()->user()->username }}</p>
                        <p class="text-[10px] font-medium text-teal-400/80 uppercase tracking-wider">{{ auth()->user()->role }}</p>
                    </div>
                    
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 rounded-full text-[11px] font-bold tracking-widest uppercase bg-rose-950/40 hover:bg-rose-900/60 text-rose-400 border border-rose-500/20 transition duration-300">
                            Keluar
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </nav>
    @endauth

    <main class="min-h-screen">
        @yield('content')
    </main>

    @if(session('success') || session('error'))
        <div id="toast" class="fixed bottom-5 right-5 z-50 transform transition-all duration-500 translate-y-10 opacity-0">
            <div class="flex items-center p-4 rounded-2xl shadow-2xl border backdrop-blur-md {{ session('success') ? 'bg-teal-950/90 border-teal-500 text-teal-200' : 'bg-rose-950/90 border-rose-500 text-rose-200' }}">
                <span class="text-sm font-semibold">{{ session('success') ?? session('error') }}</span>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toast = document.getElementById('toast');
                setTimeout(() => {
                    toast.classList.remove('translate-y-10', 'opacity-0');
                }, 100);
                setTimeout(() => {
                    toast.classList.add('translate-y-10', 'opacity-0');
                }, 5000);
            });
        </script>
    @endif

</body>
</html>