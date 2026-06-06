@extends('layouts.app')

@section('title', 'Dashboard Kepala Dinas')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-950 transition-colors duration-300 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-10 pb-6 border-b-2 border-slate-200 dark:border-slate-800">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="w-8 h-[2px] bg-emerald-500 rounded-full"></span>
                    <p class="text-[11px] font-bold text-emerald-600 dark:text-emerald-400 tracking-[0.2em] uppercase">Dinas Koperasi & UMKM Karawang</p>
                </div>
                <h1 class="text-3xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-tight">Panel Kepala Dinas</h1>
            </div>
            <button class="px-6 py-3 bg-emerald-600 text-white text-xs font-bold rounded-2xl shadow-lg shadow-emerald-500/20 hover:bg-emerald-700 transition duration-300 uppercase tracking-widest">
                Ekspor Laporan Tahun 2026
            </button>
        </div>

        {{-- METRICS GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            @php
                $metrics = [
                    ['title' => 'Koperasi Sehat', 'value' => '284', 'border' => 'hover:border-emerald-500', 'icon' => '<svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'],
                    ['title' => 'Perlu Pembinaan', 'value' => '58', 'border' => 'hover:border-amber-500', 'icon' => '<svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>'],
                    ['title' => 'Total Aset (M)', 'value' => 'Rp 42.5', 'border' => 'hover:border-blue-500', 'icon' => '<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>'],
                    ['title' => 'Partisipasi RAT', 'value' => '89%', 'border' => 'hover:border-purple-500', 'icon' => '<svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>']
                ];
            @endphp
            @foreach($metrics as $m)
            <div class="bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 p-8 rounded-[2rem] shadow-sm transition-all duration-300 {{ $m['border'] }} hover:shadow-lg hover:shadow-slate-200/50 dark:hover:shadow-none">
                <div class="flex justify-between items-start mb-4">
                    <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em]">{{ $m['title'] }}</p>
                    {!! $m['icon'] !!}
                </div>
                <h3 class="text-4xl font-black text-slate-800 dark:text-slate-100">{{ $m['value'] }}</h3>
            </div>
            @endforeach
        </div>

        {{-- VISUALISASI DATA --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
            <div class="lg:col-span-2 bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 p-8 rounded-[2rem] shadow-sm">
                <h3 class="text-xs font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest mb-6">Tren Kesehatan Koperasi</h3>
                <div class="relative h-[300px] w-full">
                    <canvas id="healthTrendChart"></canvas>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 p-8 rounded-[2rem] shadow-sm flex flex-col justify-center">
                <h3 class="text-xs font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest mb-6">Profil Risiko</h3>
                <div class="relative h-[250px] w-full">
                    <canvas id="riskDistChart"></canvas>
                </div>
            </div>
        </div>

        {{-- TABLE SECTION --}}
        <div class="bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 rounded-[2rem] shadow-sm overflow-hidden">
            <div class="p-8 border-b-2 border-slate-200 dark:border-slate-800">
                <h2 class="text-lg font-bold text-slate-800 dark:text-slate-100">Antrean Tanda Tangan Elektronik</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 dark:bg-slate-950/50">
                        <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                            <th class="px-8 py-6">Nama Koperasi</th>
                            <th class="px-6 py-6">Skor Kepatuhan</th>
                            <th class="px-8 py-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition">
                            <td class="px-8 py-6 font-bold text-slate-800 dark:text-slate-200">KUD Panca Motor Telukjambe</td>
                            <td class="px-6 py-6 font-bold text-emerald-600">98%</td>
                            <td class="px-8 py-6 text-right">
                                <button class="px-6 py-3 bg-slate-900 text-white rounded-2xl text-[10px] font-bold hover:bg-emerald-600 transition">TANDA TANGANI</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartOptions = { responsive: true, maintainAspectRatio: false };

    // Line Chart
    new Chart(document.getElementById('healthTrendChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Skor Kesehatan',
                data: [75, 78, 82, 80, 85, 92],
                borderColor: '#059669',
                backgroundColor: 'rgba(5, 150, 105, 0.1)',
                fill: true,
                tension: 0.3
            }]
        },
        options: chartOptions
    });

    // Doughnut Chart
    new Chart(document.getElementById('riskDistChart'), {
        type: 'doughnut',
        data: {
            labels: ['Rendah', 'Sedang', 'Tinggi'],
            datasets: [{
                data: [60, 30, 10],
                backgroundColor: ['#059669', '#f59e0b', '#dc2626']
            }]
        },
        options: chartOptions
    });
</script>
@endsection