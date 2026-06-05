@extends('layouts.app')

@section('title', 'Dashboard Koperasi')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-emerald-50 text-slate-800 dark:from-slate-900 dark:via-slate-950 dark:to-emerald-950 dark:text-slate-100 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10">
        
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 pb-6 border-b border-slate-200 dark:border-emerald-500/10 transition-colors duration-300">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="w-8 h-[2px] bg-emerald-500 rounded-full shadow-[0_0_8px_rgba(16,185,129,0.5)]"></span>
                    <p class="text-[11px] font-bold text-emerald-600 dark:text-emerald-400 tracking-[0.2em] uppercase">Portal Koperasi Terdaftar</p>
                </div>
                <h1 class="text-3xl font-black tracking-tight uppercase text-slate-900 dark:text-slate-100">
                    Koperasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 via-teal-500 to-cyan-600 dark:from-emerald-400 dark:via-teal-300 dark:to-cyan-400">
                        {{ $koperasi->nama_koperasi ?? 'Maju Sukaseuri' }}
                    </span>
                </h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    ID Lembaga: <span class="font-mono text-xs bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-800 px-2.5 py-1 rounded-md text-emerald-700 dark:text-emerald-300 font-bold">KOP-42190</span> 
                    • Kelola kewajiban pelaporan berkas badan hukum Anda.
                </p>
            </div>
            
            <a href="{{ route('koperasi.rat.create') }}" class="text-center px-6 py-3.5 bg-gradient-to-r from-emerald-800 to-teal-800 hover:from-emerald-700 hover:to-teal-700 dark:from-emerald-900 dark:to-teal-900 dark:hover:from-emerald-800 dark:hover:to-teal-800 text-white text-xs font-bold rounded-full transition duration-300 uppercase tracking-widest border border-emerald-500/20 dark:border-emerald-600/30 shadow-[0_4px_20px_rgba(16,185,129,0.15)]">
                Kirim Laporan RAT
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-emerald-500/10 p-6 rounded-3xl shadow-md dark:shadow-2xl flex flex-col justify-between transition-colors duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 uppercase tracking-widest">Status Keaktifan Lembaga</p>
                        <h3 class="text-2xl font-black text-slate-900 dark:text-slate-100 mt-1">Terverifikasi & Aktif</h3>
                    </div>
                    <span class="inline-flex items-center px-3.5 py-1 rounded-full text-[10px] font-black uppercase bg-emerald-50 text-emerald-700 border border-emerald-200 dark:bg-emerald-950 dark:text-emerald-400 dark:border-emerald-500/30 shadow-[0_0_15px_rgba(16,185,129,0.1)] transition-colors duration-300">
                        Grade A
                    </span>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800/60 flex items-center justify-between text-xs text-slate-500 dark:text-slate-400 transition-colors duration-300">
                    <span>Masa Berlaku Sertifikat: <strong class="text-slate-700 dark:text-slate-200">31 Des 2027</strong></span>
                    <a href="#" class="text-emerald-600 dark:text-emerald-400 font-bold hover:text-emerald-500 dark:hover:text-emerald-300 transition-colors duration-300">Unduh Sertifikat →</a>
                </div>
            </div>

            <div class="bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-emerald-500/10 p-6 rounded-3xl shadow-md dark:shadow-2xl flex flex-col justify-between transition-colors duration-300">
                <div>
                    <div class="p-2.5 w-fit bg-emerald-50 dark:bg-emerald-950/80 border border-emerald-200 dark:border-emerald-500/20 rounded-2xl text-emerald-600 dark:text-emerald-400 shadow-sm transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <p class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 uppercase tracking-widest mt-4">Laporan Buku Terakhir</p>
                    <h3 class="text-2xl font-black text-slate-900 dark:text-slate-100 mt-1">RAT Buku 2025</h3>
                </div>
                <div class="mt-3">
                    <span class="inline-flex text-[10px] font-bold text-teal-700 bg-teal-50 px-3 py-1 rounded-full border border-teal-200 dark:text-teal-400 dark:bg-teal-950/50 dark:border-teal-500/20 transition-colors duration-300">Sudah Valid</span>
                </div>
            </div>

            <div class="bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-emerald-500/10 p-6 rounded-3xl shadow-md dark:shadow-2xl flex flex-col justify-between transition-colors duration-300">
                <div>
                    <div class="p-2.5 w-fit bg-cyan-50 dark:bg-cyan-950/80 border border-cyan-200 dark:border-cyan-500/20 rounded-2xl text-cyan-600 dark:text-cyan-400 shadow-sm transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <p class="text-[10px] font-bold text-cyan-600 dark:text-cyan-400 uppercase tracking-widest mt-4">Ketua Pengurus</p>
                    <h3 class="text-xl font-black text-slate-900 dark:text-slate-100 mt-1 truncate">{{ $koperasi->ketua_koperasi ?? 'Farid Abdul Kholiq' }}</h3>
                </div>
                <div class="mt-3 text-xs text-slate-500 dark:text-slate-400 transition-colors duration-300">
                    <span>Total Anggota: <strong class="text-slate-700 dark:text-slate-200">{{ $koperasi->jumlah_anggota ?? '148' }} Orang</strong></span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white/60 dark:bg-slate-900/40 backdrop-blur-xl border border-slate-200 dark:border-emerald-500/10 p-6 rounded-[2rem] shadow-md dark:shadow-2xl space-y-4 transition-colors duration-300">
                <div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-slate-100 tracking-tight">Grafik Penilaian Kesehatan</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Tren perkembangan skor evaluasi mandiri (Pemkes) tahunan</p>
                </div>
                <div class="relative w-full h-64">
                    <canvas id="pemkesLineChart"></canvas>
                </div>
            </div>

            <div class="bg-white/60 dark:bg-slate-900/40 backdrop-blur-xl border border-slate-200 dark:border-emerald-500/10 p-6 rounded-[2rem] shadow-md dark:shadow-2xl space-y-4 transition-colors duration-300">
                <div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-slate-100 tracking-tight">Tingkat Partisipasi Rapat</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Komparasi jumlah kuorum anggota yang hadir pada forum RAT</p>
                </div>
                <div class="relative w-full h-64">
                    <canvas id="ratBarChart"></canvas>
                </div>
            </div>
        </div>

        <div class="bg-white/60 dark:bg-slate-900/40 backdrop-blur-xl border border-slate-200 dark:border-emerald-500/10 rounded-[2rem] overflow-hidden shadow-md dark:shadow-2xl transition-colors duration-300">
            <div class="p-8 border-b border-slate-200 dark:border-emerald-500/10 bg-slate-50/50 dark:bg-slate-900/20 transition-colors duration-300">
                <h2 class="text-xl font-bold text-slate-900 dark:text-slate-100 tracking-tight">Riwayat Pengajuan & Pelaporan RAT</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Pantau proses peninjauan berkas tahunan oleh tim dinas koperasi.</p>
            </div>

            <div class="p-6 overflow-x-auto">
                <table class="w-full text-left border-separate border-spacing-y-3">
                    <thead>
                        <tr class="text-[10px] font-black text-emerald-600 dark:text-emerald-400 uppercase tracking-[0.2em]">
                            <th class="px-6 py-2">Jenis Dokumen</th>
                            <th class="px-6 py-2">Tanggal Unggah</th>
                            <th class="px-6 py-2">Status Review</th>
                            <th class="px-6 py-2 text-right">Nota / Berkas</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-semibold">
                        <tr class="bg-white dark:bg-slate-950/60 border border-slate-200 dark:border-slate-800 rounded-2xl hover:scale-[1.002] transition duration-200 shadow-sm dark:shadow-none">
                            <td class="px-6 py-4 rounded-l-2xl">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-600 to-teal-700 flex items-center justify-center text-white font-black shadow-lg">
                                        R
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-800 dark:text-slate-200 transition-colors duration-300">Laporan Pertanggungjawaban RAT 2025</div>
                                        <div class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mt-0.5 transition-colors duration-300">Format: PDF (Signed)</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-600 dark:text-slate-300 transition-colors duration-300">
                                <span class="text-xs">14 Mei 2026</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-50 text-amber-700 border border-amber-200 dark:bg-amber-950 dark:text-amber-400 dark:border-amber-500/20 shadow-sm transition-colors duration-300">
                                    Sedang Ditinjau
                                </span>
                            </td>
                            <td class="px-6 py-4 rounded-r-2xl text-right">
                                <div class="flex justify-end gap-2">
                                    <button class="p-2 text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-950/40 rounded-xl border border-transparent hover:border-emerald-200 dark:hover:border-emerald-500/20 transition duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                    </button>
                                </div>
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
    document.addEventListener("DOMContentLoaded", function () {
        // Mendeteksi mode aktif saat ini untuk kustomisasi warna teks/grid chart
        const isDark = document.documentElement.classList.contains('dark');
        const gridColor = isDark ? 'rgba(255, 255, 255, 0.05)' : 'rgba(0, 0, 0, 0.05)';
        const labelColor = isDark ? '#94a3b8' : '#64748b';

        // --- 1. CONFIGURATION LINE CHART (PEMKES) ---
        const ctxLine = document.getElementById('pemkesLineChart').getContext('2d');
        
        const lineGradient = ctxLine.createLinearGradient(0, 0, 0, 200);
        lineGradient.addColorStop(0, 'rgba(16, 185, 129, 0.3)');
        lineGradient.addColorStop(1, 'rgba(16, 185, 129, 0.0)');

        const pemkesChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['2021', '2022', '2023', '2024', '2025'],
                datasets: [{
                    label: 'Skor Kesehatan',
                    data: [72.3, 78.5, 81.0, 84.2, 88.5],
                    borderColor: '#10b981',
                    borderWidth: 3,
                    pointBackgroundColor: '#34d399',
                    pointBorderColor: isDark ? '#0f172a' : '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.3,
                    fill: true,
                    backgroundColor: lineGradient
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: {
                        grid: { color: gridColor },
                        ticks: { color: labelColor, font: { size: 11, weight: 'bold' } }
                    },
                    y: {
                        min: 60,
                        max: 100,
                        grid: { color: gridColor },
                        ticks: { color: labelColor, font: { size: 11 } }
                    }
                }
            }
        });

        // --- 2. CONFIGURATION BAR CHART (PARTISIPASI RAT) ---
        const ctxBar = document.getElementById('ratBarChart').getContext('2d');
        
        const barGradient = ctxBar.createLinearGradient(0, 0, 0, 250);
        barGradient.addColorStop(0, '#06b6d4');
        barGradient.addColorStop(1, '#0891b2');

        const ratChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['2021', '2022', '2023', '2024', '2025'],
                datasets: [{
                    label: 'Anggota Hadir',
                    data: [95, 110, 125, 132, 148],
                    backgroundColor: barGradient,
                    borderRadius: 8,
                    borderSkipped: false,
                    barThickness: 24
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: labelColor, font: { size: 11, weight: 'bold' } }
                    },
                    y: {
                        grid: { color: gridColor },
                        ticks: { color: labelColor, font: { size: 11 } }
                    }
                }
            }
        });

        // SINKRONISASI GRAFIK SECARA LIVE SAAT TOMBOL THEME DIKLIK
        const themeToggleBtn = document.getElementById('theme-toggle');
        if (themeToggleBtn) {
            themeToggleBtn.addEventListener('click', function() {
                setTimeout(() => {
                    const dynamicDark = document.documentElement.classList.contains('dark');
                    const newGridColor = dynamicDark ? 'rgba(255, 255, 255, 0.05)' : 'rgba(0, 0, 0, 0.05)';
                    const newLabelColor = dynamicDark ? '#94a3b8' : '#64748b';

                    // Update Line Chart
                    pemkesChart.options.scales.x.grid.color = newGridColor;
                    pemkesChart.options.scales.x.ticks.color = newLabelColor;
                    pemkesChart.options.scales.y.grid.color = newGridColor;
                    pemkesChart.options.scales.y.ticks.color = newLabelColor;
                    pemkesChart.data.datasets[0].pointBorderColor = dynamicDark ? '#0f172a' : '#ffffff';
                    pemkesChart.update();

                    // Update Bar Chart
                    ratChart.options.scales.x.ticks.color = newLabelColor;
                    ratChart.options.scales.y.grid.color = newGridColor;
                    ratChart.options.scales.y.ticks.color = newLabelColor;
                    ratChart.update();
                }, 50); // Delay kecil untuk memastikan class 'dark' selesai bermutasi di DOM
            });
        }
    });
</script>
@endsection