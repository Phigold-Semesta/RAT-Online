@extends('layouts.app')

@section('title', 'Dashboard Koperasi')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-950 to-emerald-950 text-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10">
        
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 pb-6 border-b border-emerald-500/10">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="w-8 h-[2px] bg-emerald-500 rounded-full shadow-[0_0_8px_rgba(16,185,129,0.5)]"></span>
                    <p class="text-[11px] font-bold text-emerald-400 tracking-[0.2em] uppercase">Portal Koperasi Terdaftar</p>
                </div>
                <h1 class="text-3xl font-black tracking-tight uppercase">
                    Koperasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-cyan-400">
                        {{ $koperasi->nama_koperasi ?? 'Maju Sukaseuri' }}
                    </span>
                </h1>
                <p class="text-sm text-slate-400 mt-1">
                    ID Lembaga: <span class="font-mono text-xs bg-slate-900 border border-slate-800 px-2.5 py-1 rounded-md text-emerald-300 font-bold">KOP-42190</span> 
                    • Kelola kewajiban pelaporan berkas badan hukum Anda.
                </p>
            </div>
            
            <a href="{{ route('koperasi.rat.create') }}" class="text-center px-6 py-3.5 bg-gradient-to-r from-emerald-900 to-teal-900 hover:from-emerald-800 hover:to-teal-800 text-white text-xs font-bold rounded-full transition duration-300 uppercase tracking-widest border border-emerald-600/30 shadow-[0_4px_20px_rgba(16,185,129,0.15)]">
                Kirim Laporan RAT
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-slate-900/60 backdrop-blur-xl border border-emerald-500/10 p-6 rounded-3xl shadow-2xl flex flex-col justify-between">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] font-bold text-emerald-400 uppercase tracking-widest">Status Keaktifan Lembaga</p>
                        <h3 class="text-2xl font-black text-slate-100 mt-1">Terverifikasi & Aktif</h3>
                    </div>
                    <span class="inline-flex items-center px-3.5 py-1 rounded-full text-[10px] font-black uppercase bg-emerald-950 text-emerald-400 border border-emerald-500/30 shadow-[0_0_15px_rgba(16,185,129,0.1)]">
                        Grade A
                    </span>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-800/60 flex items-center justify-between text-xs text-slate-400">
                    <span>Masa Berlaku Sertifikat: <strong class="text-slate-200">31 Des 2027</strong></span>
                    <a href="#" class="text-emerald-400 font-bold hover:text-emerald-300 transition">Unduh Sertifikat →</a>
                </div>
            </div>

            <div class="bg-slate-900/60 backdrop-blur-xl border border-emerald-500/10 p-6 rounded-3xl shadow-2xl flex flex-col justify-between">
                <div>
                    <div class="p-2.5 w-fit bg-emerald-950/80 border border-emerald-500/20 rounded-2xl text-emerald-400 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <p class="text-[10px] font-bold text-emerald-400 uppercase tracking-widest mt-4">Laporan Buku Terakhir</p>
                    <h3 class="text-2xl font-black text-slate-100 mt-1">RAT Buku 2025</h3>
                </div>
                <div class="mt-3">
                    <span class="inline-flex text-[10px] font-bold text-teal-400 bg-teal-950/50 px-3 py-1 rounded-full border border-teal-500/20">Sudah Valid</span>
                </div>
            </div>

            <div class="bg-slate-900/60 backdrop-blur-xl border border-emerald-500/10 p-6 rounded-3xl shadow-2xl flex flex-col justify-between">
                <div>
                    <div class="p-2.5 w-fit bg-cyan-950/80 border border-cyan-500/20 rounded-2xl text-cyan-400 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <p class="text-[10px] font-bold text-cyan-400 uppercase tracking-widest mt-4">Ketua Pengurus</p>
                    <h3 class="text-xl font-black text-slate-100 mt-1 truncate">{{ $koperasi->ketua_koperasi ?? 'Farid Abdul Kholiq' }}</h3>
                </div>
                <div class="mt-3 text-xs text-slate-400">
                    <span>Total Anggota: <strong class="text-slate-200">{{ $koperasi->jumlah_anggota ?? '148' }} Orang</strong></span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-slate-900/40 backdrop-blur-xl border border-emerald-500/10 p-6 rounded-[2rem] shadow-2xl space-y-4">
                <div>
                    <h3 class="text-base font-bold text-slate-100 tracking-tight">Grafik Penilaian Kesehatan</h3>
                    <p class="text-xs text-slate-400">Tren perkembangan skor evaluasi mandiri (Pemkes) tahunan</p>
                </div>
                <div class="relative w-full h-64">
                    <canvas id="pemkesLineChart"></canvas>
                </div>
            </div>

            <div class="bg-slate-900/40 backdrop-blur-xl border border-emerald-500/10 p-6 rounded-[2rem] shadow-2xl space-y-4">
                <div>
                    <h3 class="text-base font-bold text-slate-100 tracking-tight">Tingkat Partisipasi Rapat</h3>
                    <p class="text-xs text-slate-400">Komparasi jumlah kuorum anggota yang hadir pada forum RAT</p>
                </div>
                <div class="relative w-full h-64">
                    <canvas id="ratBarChart"></canvas>
                </div>
            </div>
        </div>

        <div class="bg-slate-900/40 backdrop-blur-xl border border-emerald-500/10 rounded-[2rem] overflow-hidden shadow-2xl">
            <div class="p-8 border-b border-emerald-500/10 bg-slate-900/20">
                <h2 class="text-xl font-bold text-slate-100 tracking-tight">Riwayat Pengajuan & Pelaporan RAT</h2>
                <p class="text-sm text-slate-400">Pantau proses peninjauan berkas tahunan oleh tim dinas koperasi.</p>
            </div>

            <div class="p-6 overflow-x-auto">
                <table class="w-full text-left border-separate border-spacing-y-3">
                    <thead>
                        <tr class="text-[10px] font-black text-emerald-400 uppercase tracking-[0.2em]">
                            <th class="px-6 py-2">Jenis Dokumen</th>
                            <th class="px-6 py-2">Tanggal Unggah</th>
                            <th class="px-6 py-2">Status Review</th>
                            <th class="px-6 py-2 text-right">Nota / Berkas</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-semibold">
                        <tr class="bg-slate-950/60 border border-slate-800 rounded-2xl hover:scale-[1.002] transition duration-200">
                            <td class="px-6 py-4 rounded-l-2xl">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-600 to-teal-700 flex items-center justify-center text-white font-black shadow-lg">
                                        R
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-200">Laporan Pertanggungjawaban RAT 2025</div>
                                        <div class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mt-0.5">Format: PDF (Signed)</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-300">
                                <span class="text-xs">14 Mei 2026</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-950 text-amber-400 border border-amber-500/20 shadow-sm">
                                    Sedang Ditinjau
                                </span>
                            </td>
                            <td class="px-6 py-4 rounded-r-2xl text-right">
                                <div class="flex justify-end gap-2">
                                    <button class="p-2 text-slate-400 hover:text-emerald-400 hover:bg-emerald-950/40 rounded-xl border border-transparent hover:border-emerald-500/20 transition">
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
        // --- 1. CONFIGURATION LINE CHART (PEMKES) ---
        const ctxLine = document.getElementById('pemkesLineChart').getContext('2d');
        
        // Membuat gradien warna mewah untuk chart area
        const lineGradient = ctxLine.createLinearGradient(0, 0, 0, 200);
        lineGradient.addColorStop(0, 'rgba(16, 185, 129, 0.3)');
        lineGradient.addColorStop(1, 'rgba(16, 185, 129, 0.0)');

        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['2021', '2022', '2023', '2024', '2025'], // Tahun Buku
                datasets: [{
                    label: 'Skor Kesehatan',
                    data: [72.3, 78.5, 81.0, 84.2, 88.5], // Contoh data skor
                    borderColor: '#10b981', // Emerald-500
                    borderWidth: 3,
                    pointBackgroundColor: '#34d399',
                    pointBorderColor: '#0f172a',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.3, // Membuat garis melengkung smooth
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
                        grid: { color: 'rgba(255, 255, 255, 0.05)' },
                        ticks: { color: '#94a3b8', font: { size: 11, weight: 'bold' } }
                    },
                    y: {
                        min: 60,
                        max: 100,
                        grid: { color: 'rgba(255, 255, 255, 0.05)' },
                        ticks: { color: '#94a3b8', font: { size: 11 } }
                    }
                }
            }
        });

        // --- 2. CONFIGURATION BAR CHART (PARTISIPASI RAT) ---
        const ctxBar = document.getElementById('ratBarChart').getContext('2d');
        
        const barGradient = ctxBar.createLinearGradient(0, 0, 0, 250);
        barGradient.addColorStop(0, '#06b6d4'); // Cyan-500
        barGradient.addColorStop(1, '#0891b2'); // Cyan-600

        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['2021', '2022', '2023', '2024', '2025'],
                datasets: [{
                    label: 'Anggota Hadir',
                    data: [95, 110, 125, 132, 148], // Contoh data kuorum hadir
                    backgroundColor: barGradient,
                    borderRadius: 8, // Membuat sudut batang tumpul modern
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
                        ticks: { color: '#94a3b8', font: { size: 11, weight: 'bold' } }
                    },
                    y: {
                        grid: { color: 'rgba(255, 255, 255, 0.05)' },
                        ticks: { color: '#94a3b8', font: { size: 11 } }
                    }
                }
            }
        });
    });
</script>
@endsection