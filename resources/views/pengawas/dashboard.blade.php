@extends('layouts.app')

@section('title', 'Dashboard Pengawas Lapangan')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-900 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        {{-- HEADER SECTION --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-10 pb-6 border-b-2 border-slate-200 dark:border-slate-700">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="w-8 h-[2px] bg-amber-500 rounded-full"></span>
                    <p class="text-[11px] font-bold text-amber-600 tracking-[0.2em] uppercase">Tim Pengawas Koperasi Lapangan</p>
                </div>
                <h1 class="text-3xl font-black text-slate-800 dark:text-white tracking-tight uppercase">
                    Panel <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-500">Pengawas Lapangan</span>
                </h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Selamat datang, <span class="font-semibold text-slate-700 dark:text-slate-200">{{ auth()->user()->username ?? 'Pengawas' }}</span>. Kelola agenda peninjauan fisik dan validasi kepatuhan koperasi.</p>
            </div>
            
            <div class="flex items-center gap-3 bg-white dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 px-5 py-3 rounded-2xl shadow-sm">
                <div class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-pulse"></div>
                <div class="flex flex-col">
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Beban Pengawasan</span>
                    <span class="text-xs font-bold text-slate-700 dark:text-slate-200">{{ $totalPending ?? 0 }} Agenda Pending</span>
                </div>
            </div>
        </div>

        {{-- STATS GRID (DIPINDAHKAN KE ATAS) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            @foreach([
                ['icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01', 'label' => 'Belum Diawasi', 'value' => $countPending ?? 0, 'color' => 'amber'],
                ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Kunjungan Lapangan', 'value' => $countKunjungan ?? 0, 'color' => 'blue'],
                ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Selesai Diinspeksi', 'value' => $countSelesai ?? 0, 'color' => 'emerald'],
                ['icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z', 'label' => 'Koperasi Bermasalah', 'value' => $countBermasalah ?? 0, 'color' => 'rose'],
            ] as $stat)
            <div class="bg-white dark:bg-slate-800 border-2 border-slate-200/90 dark:border-slate-700 p-6 rounded-3xl shadow-md hover:shadow-lg transition duration-300 group">
                <div class="p-3 bg-{{ $stat['color'] }}-50 dark:bg-slate-900 rounded-2xl text-{{ $stat['color'] }}-600 inline-block mb-4 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                    </svg>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $stat['label'] }}</p>
                <h3 class="text-3xl font-black text-slate-800 dark:text-white mt-1">{{ $stat['value'] }}</h3>
            </div>
            @endforeach
        </div>

        {{-- CHART VISUALIZATION --}}
        <div class="mb-10 p-6 bg-white dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-3xl shadow-sm">
            <h3 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Statistik Pengawasan</h3>
            <canvas id="koperasiChart" class="max-h-[150px]"></canvas>
        </div>

        {{-- TABLE SECTION --}}
        <div class="bg-white dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-[2rem] overflow-hidden shadow-lg shadow-slate-200/50 dark:shadow-none">
            <div class="p-8 border-b-2 border-slate-200 dark:border-slate-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="text-xl font-bold text-slate-800 dark:text-white tracking-tight">Daftar Agenda Pengawasan Koperasi</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Daftar entitas koperasi yang wajib ditinjau kepatuhannya.</p>
                </div>
                <a href="{{ route('pengawas.tugas.index') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700 uppercase tracking-widest">Lihat Semua →</a>
            </div>

            <div class="overflow-x-auto p-4">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b-2 border-slate-100 dark:border-slate-700">
                            <th class="px-6 py-4">Koperasi Target</th>
                            <th class="px-6 py-4">Wilayah Operasional</th>
                            <th class="px-6 py-4">Status Kepatuhan</th>
                            <th class="px-6 py-4 text-right">Aksi Kerja</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        @forelse($tugasTerbaru as $item)
                        <tr class="group hover:bg-slate-50 dark:hover:bg-slate-700/30 transition duration-200">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-amber-600 flex items-center justify-center text-white font-bold shadow-md">
                                        {{ substr($item->nama_koperasi, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-800 dark:text-white">{{ $item->nama_koperasi }}</div>
                                        <div class="text-[10px] font-bold text-slate-400 uppercase">Jenis: {{ $item->jenis_koperasi }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-xs font-bold text-slate-700 dark:text-slate-300">{{ $item->kecamatan }}</span>
                            </td>
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-blue-800 shadow-sm">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="px-6 py-5 text-right">
                                <a href="{{ route('pengawas.tugas.form', $item->id) }}" class="px-4 py-2 text-xs font-bold bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-white rounded-xl hover:bg-amber-500 hover:text-white transition shadow-sm">
                                    Mulai Pengawasan
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center py-10 text-slate-400 font-bold">Tidak ada agenda tugas saat ini.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('koperasiChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Pending', 'Kunjungan', 'Selesai', 'Masalah'],
            datasets: [{
                label: 'Aktivitas',
                data: [{{ $countPending }}, {{ $countKunjungan }}, {{ $countSelesai }}, {{ $countBermasalah }}],
                borderColor: '#f59e0b',
                backgroundColor: 'rgba(245, 158, 11, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });
</script>
@endsection