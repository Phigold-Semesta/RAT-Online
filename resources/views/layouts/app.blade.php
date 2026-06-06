<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'RAT Online') - Dinas Koperasi</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="h-full antialiased selection:bg-teal-500 selection:text-slate-950 bg-slate-50 text-slate-800 dark:bg-slate-950 dark:text-slate-100 transition-colors duration-300">

    @auth
    <nav class="sticky top-0 z-40 w-full bg-slate-100/90 dark:bg-slate-900/60 backdrop-blur-md border-b border-slate-200/80 dark:border-teal-500/10 shadow-sm dark:shadow-[0_4px_30px_rgba(0,0,0,0.3)] transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 bg-gradient-to-r from-cyan-500 to-teal-500 p-2 rounded-xl shadow-[0_0_10px_rgba(20,184,166,0.3)]">
                        <span class="text-xs font-black text-white tracking-wider">RAT</span>
                    </div>
                    <div class="hidden sm:block">
                        <span class="text-sm font-bold tracking-wider uppercase text-slate-800 dark:text-slate-200">RAT <span class="text-cyan-600 dark:text-cyan-400">Online</span></span>
                        <p class="text-[9px] font-medium text-slate-500 dark:text-slate-400 tracking-wider">DISKOP UMKM KARAWANG</p>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-1">
                    
                    {{-- 1. NAVIGASI AKTOR: ADMIN DINAS --}}
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('admin.dashboard') ? 'bg-white text-cyan-700 dark:bg-cyan-950 dark:text-cyan-400 border border-slate-300/80 dark:border-cyan-500/30 shadow-sm dark:shadow-none' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50' }}">
                            Dashboard
                        </a>
                        <a href="#" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50 transition">
                            Monitoring RAT
                        </a>
                        <a href="#" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50 transition">
                            Rekap Laporan
                        </a>
                        <a href="#" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50 transition">
                            Kelola User
                        </a>
                    @endif

                    {{-- 2. NAVIGASI AKTOR: KOPERASI --}}
                    @if(auth()->user()->role === 'koperasi')
                        <a href="{{ route('koperasi.dashboard') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('koperasi.dashboard') ? 'bg-white text-cyan-700 dark:bg-cyan-950 dark:text-cyan-400 border border-slate-300/80 dark:border-cyan-500/30 shadow-sm dark:shadow-none' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50' }}">
                            Dashboard
                        </a>
                        <a href="{{ url('/koperasi/profil') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->is('koperasi/profil*') ? 'bg-white text-cyan-700 dark:bg-cyan-950 dark:text-cyan-400 border border-slate-300/80 dark:border-cyan-500/30 shadow-sm dark:shadow-none' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50' }}">
                            Profil Koperasi
                        </a>
                        <a href="{{ route('koperasi.pemkes.index') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('koperasi.pemkes.*') ? 'bg-white text-cyan-700 dark:bg-cyan-950 dark:text-cyan-400 border border-slate-300/80 dark:border-cyan-500/30 shadow-sm dark:shadow-none' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50' }}">
                            Pemkes
                        </a>
                        <a href="{{ route('koperasi.rat.index') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('koperasi.rat.*') ? 'bg-white text-cyan-700 dark:bg-cyan-950 dark:text-cyan-400 border border-slate-300/80 dark:border-cyan-500/30 shadow-sm dark:shadow-none' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50' }}">
                            Pelaksanaan RAT
                        </a>
                    @endif

                    {{-- 3. NAVIGASI AKTOR: PENGAWAS LAPANGAN (DISEMPURNAKAN) --}}
                    @if(auth()->user()->role === 'pengawas')
                        <a href="{{ route('pengawas.dashboard') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('pengawas.dashboard') ? 'bg-white text-cyan-700 dark:bg-cyan-950 dark:text-cyan-400 border border-slate-300/80 dark:border-cyan-500/30 shadow-sm dark:shadow-none' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('pengawas.tugas.index') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('pengawas.tugas.*') ? 'bg-white text-cyan-700 dark:bg-cyan-950 dark:text-cyan-400 border border-slate-300/80 dark:border-cyan-500/30 shadow-sm dark:shadow-none' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50' }}">
                            Daftar Tugas
                        </a>
                        <a href="{{ route('pengawas.riwayat.index') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('pengawas.riwayat.*') ? 'bg-white text-cyan-700 dark:bg-cyan-950 dark:text-cyan-400 border border-slate-300/80 dark:border-cyan-500/30 shadow-sm dark:shadow-none' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50' }}">
                            Riwayat
                        </a>
                    @endif

                    {{-- 4. NAVIGASI AKTOR: PA KADIS --}}
                    @if(auth()->user()->role === 'kadis')
                        <a href="{{ route('kadis.dashboard') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('kadis.dashboard') ? 'bg-white text-cyan-700 dark:bg-cyan-950 dark:text-cyan-400 border border-slate-300/80 dark:border-cyan-500/30 shadow-sm dark:shadow-none' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('kadis.data-koperasi') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('kadis.data-koperasi*') ? 'bg-white text-cyan-700 dark:bg-cyan-950 dark:text-cyan-400 border border-slate-300/80 dark:border-cyan-500/30 shadow-sm dark:shadow-none' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:bg-white/60 dark:hover:bg-slate-800/50' }}">
                            Data Koperasi
                        </a>
                        <a href="{{ route('kadis.laporan.index') }}" class="px-4 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition {{ request()->routeIs('kadis.laporan.*') ? 'bg-white text-teal-700 dark:bg-teal-950 dark:text-teal-400 border border-teal-300 dark:border-teal-500/30 shadow-sm dark:shadow-none' : 'text-slate-600 dark:text-slate-400 hover:text-teal-700 dark:hover:text-teal-400 hover:bg-teal-50 dark:hover:bg-teal-950/50' }}">
                            Laporan & Validasi
                        </a>
                    @endif

                </div>

                <div class="flex items-center gap-4">
                    <button id="theme-toggle" type="button" class="p-2.5 rounded-full text-slate-500 dark:text-slate-400 hover:bg-white/80 dark:hover:bg-slate-800/80 border border-slate-200 dark:border-slate-700 transition duration-300 focus:outline-none">
                        <svg id="theme-toggle-light-icon" class="hidden w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 2.293a1 1 0 011.414 0l.707.707a1 1 0 01-1.414 1.414l-.707-.707a1 1 0 010-1.414zm4 4.707a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM14 15.707a1 1 0 010 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 0zm-4 1.293a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4-2.293a1 1 0 010-1.414l.707-.707a1 1 0 011.414 1.414l-.707.707a1 1 0 01-1.414 0zM2 10a1 1 0 011-1h1a1 1 0 110 2H3a1 1 0 01-1-1zm2-4.293a1 1 0 010-1.414l.707-.707a1 1 0 111.414 1.414l-.707.707a1 1 0 01-1.414 0zM7 10a3 3 0 116 0 3 3 0 01-6 0z"></path>
                        </svg>
                        <svg id="theme-toggle-dark-icon" class="hidden w-4 h-4 text-cyan-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </button>

                    <div class="text-right hidden sm:block">
                        <p class="text-xs font-bold text-slate-800 dark:text-slate-200">{{ auth()->user()->nama_lengkap }}</p>
                        <p class="text-[10px] font-medium text-teal-600 dark:text-teal-400/80 uppercase tracking-wider">{{ auth()->user()->role }}</p>
                    </div>
                    
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 rounded-full text-[11px] font-bold tracking-widest uppercase bg-rose-100 hover:bg-rose-200 dark:bg-rose-950/40 dark:hover:bg-rose-900/60 text-rose-600 dark:text-rose-400 border border-rose-300 dark:border-rose-500/20 transition duration-300">
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
            <div class="flex items-center p-4 rounded-2xl shadow-2xl border backdrop-blur-md {{ session('success') ? 'bg-teal-50 dark:bg-teal-950/90 border-teal-300 dark:border-teal-500 text-teal-800 dark:text-teal-200' : 'bg-rose-50 dark:bg-rose-950/90 border-rose-300 dark:border-rose-500 text-rose-800 dark:text-rose-200' }}">
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

    <script>
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        if (document.documentElement.classList.contains('dark')) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        const themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    </script>
</body>
</html>