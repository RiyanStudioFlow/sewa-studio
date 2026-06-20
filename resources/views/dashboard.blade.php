@extends('layouts.app') 

@section('content')
<!-- MAIN WRAPPER PREMIUM DARK LUXE -->
<div class="min-h-screen bg-gradient-to-br from-slate-950 via-gray-950 to-slate-900 text-slate-100 font-sans antialiased selection:bg-amber-500 selection:text-black">
    
    <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8 max-w-7xl animate-fade-in">

        <!-- ========================================== -->
        <!-- PREMIUM HEADER SECTION WITH PROJECT TITLE  -->
        <!-- ========================================== -->
        <div class="relative overflow-hidden mb-10 rounded-3xl border border-gray-800/60 bg-gradient-to-r from-gray-900/80 via-slate-900/50 to-gray-900/80 p-6 sm:p-8 backdrop-blur-xl shadow-2xl shadow-black/40">
            <div class="absolute -right-20 -top-20 h-40 w-40 rounded-full bg-amber-500/10 blur-3xl"></div>
            <div class="absolute -left-20 -bottom-20 h-40 w-40 rounded-full bg-indigo-500/10 blur-3xl"></div>
            
            <div class="relative flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div>
                    <div class="flex flex-wrap items-center gap-2.5">
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-gradient-to-r from-amber-500/20 to-yellow-500/20 border border-amber-500/30 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-amber-400">
                            <span class="h-1.5 w-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                            Enterprise Architecture
                        </span>
                        <span class="rounded-md border border-slate-800 bg-slate-950/60 px-2 py-1 font-mono text-[10px] font-medium text-slate-400">Laravel 12 v2.4-Stable</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-black tracking-tight text-white mt-4 bg-gradient-to-r from-white via-slate-200 to-slate-400 bg-clip-text text-transparent">
                        Rancang Bangun Sistem Informasi Penyewaan Peralatan Studio Kreatif
                    </h1>
                    <p class="text-sm text-slate-400 mt-2 font-medium max-w-3xl leading-relaxed">
                        Arsitektur Otomatisasi Jadwal Anti-Bentrok, Inspeksi Quality Control Tingkat Lanjut, & Manajemen Risiko Alur Kerja
                    </p>
                </div>
                
                <div class="flex items-center gap-3.5 bg-slate-950/80 border border-slate-800 p-3.5 rounded-2xl shadow-xl w-full md:w-auto">
                    <div class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                    </div>
                    <div class="text-xs">
                        <p class="text-slate-500 font-bold uppercase tracking-wider text-[9px]">Deployment Status</p>
                        <p class="font-mono text-emerald-400 font-extrabold mt-0.5">Railway Live Sync</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================================================= -->
        <!-- 👑 ROLE PEGAWAI (ADMIN) - MANAGEMENT ARCHITECTURE CONTROL                 -->
        <!-- ========================================================================= -->
        @if(auth()->user()->role == 'admin')
            
            <!-- STATS COUNTER GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <!-- Stat Card 1 -->
                <div class="group relative overflow-hidden bg-slate-900/40 border border-slate-800/80 p-6 rounded-2xl transition-all duration-300 hover:border-amber-500/40 hover:-translate-y-1 shadow-lg">
                    <div class="flex justify-between items-start text-slate-400">
                        <span class="text-[11px] font-bold uppercase tracking-widest text-slate-500 group-hover:text-amber-400 transition-colors">Total Aset Studio</span>
                        <div class="p-2.5 bg-slate-950 rounded-xl border border-slate-800 text-lg group-hover:scale-110 transition-transform">📷</div>
                    </div>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-3xl font-black text-white">4</span>
                        <span class="text-xs text-slate-500 font-medium">Unit Terdaftar</span>
                    </div>
                    <div class="mt-4 text-[10px] text-slate-400 bg-slate-950/80 px-2.5 py-1.5 rounded-lg border border-slate-800/60 font-mono flex items-center justify-between">
                        <span>Aset Aktif:</span>
                        <span class="text-amber-400 font-bold">Sony, Mac, Epson, JBL</span>
                    </div>
                </div>

                <!-- Stat Card 2 -->
                <div class="group relative overflow-hidden bg-slate-900/40 border border-slate-800/80 p-6 rounded-2xl transition-all duration-300 hover:border-indigo-500/40 hover:-translate-y-1 shadow-lg">
                    <div class="flex justify-between items-start text-slate-400">
                        <span class="text-[11px] font-bold uppercase tracking-widest text-slate-500 group-hover:text-indigo-400 transition-colors">Monitoring Jadwal</span>
                        <div class="p-2.5 bg-slate-950 rounded-xl border border-slate-800 text-lg group-hover:scale-110 transition-transform">📅</div>
                    </div>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-3xl font-black text-white">2</span>
                        <span class="text-xs text-slate-500 font-medium">Sewa Berjalan</span>
                    </div>
                    <div class="mt-4 text-[10px] text-indigo-400 bg-indigo-950/20 px-2.5 py-1.5 rounded-lg border border-indigo-900/30 font-mono flex items-center justify-between">
                        <span>Database Lock:</span>
                        <span class="font-bold">🔒 1 Tanggal Terkunci</span>
                    </div>
                </div>

                <!-- Stat Card 3 -->
                <div class="group relative overflow-hidden bg-slate-900/40 border border-slate-800/80 p-6 rounded-2xl transition-all duration-300 hover:border-emerald-500/40 hover:-translate-y-1 shadow-lg">
                    <div class="flex justify-between items-start text-slate-400">
                        <span class="text-[11px] font-bold uppercase tracking-widest text-slate-500 group-hover:text-emerald-400 transition-colors">Arus Kas Denda</span>
                        <div class="p-2.5 bg-slate-950 rounded-xl border border-slate-800 text-lg group-hover:scale-110 transition-transform">💰</div>
                    </div>
                    <div class="mt-4">
                        <span class="text-2xl font-black text-emerald-400 font-mono">Rp 350.000</span>
                    </div>
                    <div class="mt-5 text-[10px] text-slate-500 font-mono flex items-center justify-between">
                        <span>Sanksi Karusakan &lt; 50%</span>
                    </div>
                </div>

                <!-- Stat Card 4 -->
                <div class="group relative overflow-hidden bg-slate-900/40 border border-red-900/30 p-6 rounded-2xl transition-all duration-300 hover:border-red-500/40 hover:-translate-y-1 shadow-lg">
                    <div class="flex justify-between items-start text-slate-400">
                        <span class="text-[11px] font-bold uppercase tracking-widest text-slate-500 group-hover:text-red-400 transition-colors">Daftar Hitam Risiko</span>
                        <div class="p-2.5 bg-slate-950 rounded-xl border border-slate-800 text-lg group-hover:scale-110 transition-transform">🚫</div>
                    </div>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-3xl font-black text-red-500">1</span>
                        <span class="text-xs text-slate-500 font-medium">User Dibekukan</span>
                    </div>
                    <div class="mt-4 text-[10px] text-red-400 bg-red-950/20 px-2.5 py-1.5 rounded-lg border border-red-900/30 font-mono flex items-center justify-between">
                        <span>Penyebab Sanksi:</span>
                        <span class="font-bold">⚠️ Rusak Parah &ge; 50%</span>
                    </div>
                </div>
            </div>

            <!-- ACTION BAR PANEL -->
            <div class="bg-gradient-to-r from-slate-900 to-gray-900 border border-slate-800 p-5 rounded-2xl flex flex-col sm:flex-row justify-between items-center gap-4 mb-10 shadow-lg">
                <div class="text-center sm:text-left">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-amber-400">Quick Access Panel Pegawai</h3>
                    <p class="text-xs text-slate-500 mt-1">Eksekusi manipulasi data, input stok aset, lan review log denda dhasar persentase karusakan.</p>
                </div>
                <div class="flex flex-wrap gap-3 w-full sm:w-auto">
                    <button class="flex-1 sm:flex-none text-center bg-slate-950 hover:bg-slate-800 border border-slate-800 text-white text-xs font-bold py-2.5 px-5 rounded-xl transition duration-200 shadow-md">
                        + Tambah Stok Aset
                    </button>
                    <button class="flex-1 sm:flex-none text-center bg-gradient-to-r from-amber-600 to-amber-500 hover:from-amber-500 hover:to-amber-400 text-slate-950 text-xs font-extrabold py-2.5 px-5 rounded-xl transition duration-200 shadow-lg shadow-amber-500/10">
                        Proses QC Pengembalian
                    </button>
                </div>
            </div>

            <!-- KATALOG ASET & INSPEKSI QC -->
            <div class="space-y-10">
                <!-- Bagian 1: Katalog -->
                <div class="bg-slate-900/30 border border-slate-800/80 p-6 rounded-2xl shadow-xl">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-slate-800 pb-4 mb-6 gap-2">
                        <div>
                            <h2 class="text-lg font-bold text-white flex items-center gap-2">
                                <span class="h-3 w-1.5 bg-amber-500 rounded-full block"></span>
                                1. Katalog Aset Studio & Kontrol Validasi File Upload
                            </h2>
                            <p class="text-xs text-slate-500 mt-0.5">Pegawai menginput data barang dengan validasi ekstensi format ketat bawaan Laravel 12 Engine.</p>
                        </div>
                        <span class="text-[10px] font-mono bg-slate-950 text-slate-400 border border-slate-800 px-3 py-1 rounded-full">Format Aturan: Max 2048KB (JPG/PNG)</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Card 1 -->
                        <div class="bg-slate-950/60 border border-slate-800 p-4 rounded-xl hover:border-slate-700 transition group">
                            <div class="w-full h-36 bg-slate-900 rounded-lg mb-4 flex flex-col items-center justify-center border border-slate-800 group-hover:bg-slate-800/40 transition">
                                <span class="text-3xl mb-1">📸</span>
                                <span class="font-mono text-[10px] text-amber-400">sony_a7ii_prod.jpg</span>
                                <span class="text-[9px] text-slate-600 font-mono mt-0.5">System Checked • 1.4 MB</span>
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-bold text-sm text-slate-200">Sony Alpha A7 IIC</h4>
                                    <p class="text-[11px] text-slate-500 mt-0.5">Kategori: Kamera Utama</p>
                                </div>
                                <span class="bg-emerald-950/50 border border-emerald-900 text-emerald-400 text-[9px] font-bold px-2 py-0.5 rounded">Ready</span>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="bg-slate-950/60 border border-slate-800 p-4 rounded-xl hover:border-slate-700 transition group">
                            <div class="w-full h-36 bg-slate-900 rounded-lg mb-4 flex flex-col items-center justify-center border border-slate-800 group-hover:bg-slate-800/40 transition">
                                <span class="text-3xl mb-1">💻</span>
                                <span class="font-mono text-[10px] text-amber-400">macbook_m3_render.png</span>
                                <span class="text-[9px] text-slate-600 font-mono mt-0.5">System Checked • 890 KB</span>
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-bold text-sm text-slate-200">MacBook Pro M3</h4>
                                    <p class="text-[11px] text-slate-500 mt-0.5">Kategori: Editing & Render</p>
                                </div>
                                <span class="bg-emerald-950/50 border border-emerald-900 text-emerald-400 text-[9px] font-bold px-2 py-0.5 rounded">Ready</span>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="bg-slate-950/60 border border-slate-800 p-4 rounded-xl hover:border-slate-700 transition group">
                            <div class="w-full h-36 bg-slate-900 rounded-lg mb-4 flex flex-col items-center justify-center border border-slate-800 group-hover:bg-slate-800/40 transition">
                                <span class="text-3xl mb-1">📽️</span>
                                <span class="font-mono text-[10px] text-amber-400">epson_eb_presentation.jpg</span>
                                <span class="text-[9px] text-slate-600 font-mono mt-0.5">System Checked • 1.8 MB</span>
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-bold text-sm text-slate-200">Epson EB-X400</h4>
                                    <p class="text-[11px] text-slate-500 mt-0.5">Kategori: Proyektor</p>
                                </div>
                                <span class="bg-emerald-950/50 border border-emerald-900 text-emerald-400 text-[9px] font-bold px-2 py-0.5 rounded">Ready</span>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="bg-slate-950/60 border border-slate-800 p-4 rounded-xl hover:border-slate-700 transition group">
                            <div class="w-full h-36 bg-slate-900 rounded-lg mb-4 flex flex-col items-center justify-center border border-slate-800 group-hover:bg-slate-800/40 transition">
                                <span class="text-3xl mb-1">🔊</span>
                                <span class="font-mono text-[10px] text-amber-400">jbl_partybox_sound.jpg</span>
                                <span class="text-[9px] text-slate-600 font-mono mt-0.5">System Checked • 2.0 MB</span>
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-bold text-sm text-slate-200">JBL PartyBox 310</h4>
                                    <p class="text-[11px] text-slate-500 mt-0.5">Kategori: Audio Sistem</p>
                                </div>
                                <span class="bg-amber-950/50 border border-amber-900 text-amber-400 text-[9px] font-bold px-2 py-0.5 rounded">Disewa</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian 4: Log Inspeksi QC -->
                <div class="bg-slate-900/30 border border-slate-800/80 p-6 rounded-2xl shadow-xl">
                    <div class="border-b border-slate-800 pb-4 mb-6">
                        <h2 class="text-lg font-bold text-white flex items-center gap-2">
                            <span class="h-3 w-1.5 bg-red-500 rounded-full block"></span>
                            4. Log Inspeksi Quality Control (QC) & Otomatisasi Aturan Sanksi Kondisi
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Kriteria otomatisasi pembagian denda finansial utawa pambekukan akun adhedhasar input nilai karusakan (%) barang.</p>
                    </div>

                    <div class="overflow-x-auto rounded-xl border border-slate-800 shadow-2xl bg-slate-950/40">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-slate-950 font-mono text-slate-400 uppercase tracking-wider border-b border-slate-800">
                                    <th class="p-4 font-bold">Data Penyewa</th>
                                    <th class="p-4 font-bold">Alat Studio</th>
                                    <th class="p-4 font-bold text-center">Input Karusakan</th>
                                    <th class="p-4 font-bold">Logika Status Sistem</th>
                                    <th class="p-4 font-bold">Konsekuensi / Aturan Sanksi</th>
                                    <th class="p-4 font-bold">File Bukti Fisik</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/60 font-medium">
                                <!-- Kondisi 1 -->
                                <tr class="hover:bg-slate-900/30 transition">
                                    <td class="p-4">
                                        <p class="text-slate-200">Budi Jatmiko</p>
                                        <span class="text-[10px] text-slate-500 font-mono block mt-0.5">ID: CUST-8831</span>
                                    </td>
                                    <td class="p-4 text-slate-300">Sony Alpha A7 IIC</td>
                                    <td class="p-4 text-center font-bold font-mono bg-emerald-950/10 text-emerald-400">0%</td>
                                    <td class="p-4">
                                        <span class="inline-flex items-center gap-1.5 rounded-md bg-emerald-950/50 border border-emerald-900 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-emerald-400 w-full justify-center">
                                            🟢 Kondisi Aman
                                        </span>
                                    </td>
                                    <td class="p-4 text-slate-400">Transaksi dinyatake Selesai, Bebas Denda.</td>
                                    <td class="p-4 text-slate-600 font-mono text-[10px] italic">- Ora Perlu File -</td>
                                </tr>
                                <!-- Kondisi 2 -->
                                <tr class="hover:bg-slate-900/30 transition">
                                    <td class="p-4">
                                        <p class="text-slate-200">Siti Rahmawati</p>
                                        <span class="text-[10px] text-slate-500 font-mono block mt-0.5">ID: CUST-4412</span>
                                    </td>
                                    <td class="p-4 text-slate-300">MacBook Pro M3</td>
                                    <td class="p-4 text-center font-bold font-mono bg-amber-950/10 text-amber-400">25%</td>
                                    <td class="p-4">
                                        <span class="inline-flex items-center gap-1.5 rounded-md bg-amber-950/50 border border-amber-900 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-amber-400 w-full justify-center">
                                            🟡 Kondisi Lecet
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <p class="text-amber-200 font-semibold">Wajib Bayar Denda Uang</p>
                                        <span class="text-[10px] text-slate-500 block font-mono mt-0.5">Nominal: Rp 350.000</span>
                                    </td>
                                    <td class="p-4">
                                        <a href="#" class="text-indigo-400 hover:text-indigo-300 inline-flex items-center gap-1 font-mono text-[11px] underline">
                                            📁 foto_bukti_lecet.jpg
                                        </a>
                                    </td>
                                </tr>
                                <!-- Kondisi 3 -->
                                <tr class="hover:bg-slate-900/30 transition">
                                    <td class="p-4">
                                        <p class="text-slate-200">Riyan Dimas</p>
                                        <span class="text-[10px] text-slate-500 font-mono block mt-0.5">ID: CUST-0911</span>
                                    </td>
                                    <td class="p-4 text-slate-300">JBL PartyBox 310</td>
                                    <td class="p-4 text-center font-bold font-mono bg-red-950/10 text-red-500">&ge; 60%</td>
                                    <td class="p-4">
                                        <span class="inline-flex items-center gap-1.5 rounded-md bg-red-950/50 border border-red-900 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-red-400 w-full justify-center shadow-lg shadow-red-950/20">
                                            🔴 Rusak Parah
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <p class="text-red-400 font-bold">Wajib Ganti Unit Baru</p>
                                        <span class="inline-block mt-1 text-[9px] font-bold bg-red-950 text-red-400 border border-red-900 px-1.5 py-0.5 rounded font-mono">Akun Di-Suspend</span>
                                    </td>
                                    <td class="p-4 text-slate-600 font-mono text-[10px] italic">- Proses Blokir Server -</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Bagian 5: Reporting Bulanan -->
                <div class="bg-slate-900/30 border border-slate-800/80 p-6 rounded-2xl shadow-xl">
                    <div class="border-b border-slate-800 pb-4 mb-4">
                        <h2 class="text-lg font-bold text-white flex items-center gap-2">
                            <span class="h-3 w-1.5 bg-emerald-500 rounded-full block"></span>
                            5. Panel Rekapitulasi Cetak Laporan Bulanan (Audit Keuangan)
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Admin bisa memantau akumulasi data pendapatan denda lecet lan daftar hitam user sing durung ngrampungake ganti barang.</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 font-mono text-xs mt-4">
                        <div class="p-4 bg-slate-950/80 border border-slate-800 rounded-xl">
                            <span class="text-slate-500 block mb-1 font-bold">TOTAL PENDAPATAN SEWA:</span>
                            <span class="text-xl font-bold text-white">Rp 2.850.000</span>
                            <span class="text-[9px] text-emerald-400 block mt-2 font-sans">✔️ Sinkron SQL DB</span>
                        </div>
                        <div class="p-4 bg-slate-950/80 border border-slate-800 rounded-xl">
                            <span class="text-slate-500 block mb-1 font-bold">TOTAL MASUK DENDA LECET:</span>
                            <span class="text-xl font-bold text-amber-400">Rp 350.000</span>
                            <span class="text-[9px] text-slate-500 block mt-2 font-sans">Dari 1 Kasus Insiden</span>
                        </div>
                        <div class="p-4 bg-slate-950/80 border border-red-950 bg-opacity-40 rounded-xl">
                            <span class="text-red-400 block mb-1 font-bold">DAFTAR HITAM USER AKTIF:</span>
                            <span class="text-xl font-bold text-red-500">1 Akun Ditahan</span>
                            <span class="text-[9px] text-red-400/60 block mt-2 font-sans">Status: Ganti Barang</span>
                        </div>
                    </div>
                </div>
            </div>

        <!-- ========================================================================= -->
        <!-- 🧑‍💼 ROLE PENYEWA (CUSTOMER) - CUSTOMER EXPERIENCE PLATFORM                -->
        <!-- ========================================================================= -->
        @elseif(auth()->user()->role == 'pelanggan')
            
            <!-- CONTROLLER ACCOUNT STATUS BANNER -->
            <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-slate-900 border border-slate-800 p-5 rounded-2xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10 shadow-xl">
                <div>
                    <h3 class="text-sm font-bold text-white">Portal Dashboard Penyewa</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Sistem Manajemen Risiko otomatisasi ngawasi riwayat kepatuhan sanksi akun sampeyan.</p>
                </div>
                <div class="inline-flex items-center gap-2 bg-emerald-950/50 border border-emerald-900/60 px-4 py-2 rounded-xl">
                    <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-xs font-mono font-bold text-emerald-400 uppercase tracking-wider">
                        Status Akun: Aktif (Aman Soko Sanksi)
                    </span>
                </div>
            </div>

            <div class="space-y-10">
                <!-- Bagian 2: Booking Engine Anti Bentrok -->
                <div class="bg-slate-900/30 border border-slate-800/80 p-6 rounded-2xl shadow-xl">
                    <div class="border-b border-slate-800 pb-4 mb-6">
                        <h2 class="text-lg font-bold text-white flex items-center gap-2">
                            <span class="h-3 w-1.5 bg-indigo-500 rounded-full block"></span>
                            2. Sistem Booking Peralatan & Validasi Tanggal Otomatis (Anti-Bentrok)
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Backend Laravel otomatis nolak transaksi nggunakake query tanggal yen unit kasebut wis di-booking pangguna liyane.</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Form -->
                        <div class="bg-slate-950 border border-slate-800 p-5 rounded-xl space-y-4 text-xs shadow-inner">
                            <span class="text-amber-400 font-bold uppercase text-[10px] tracking-wider font-mono block">Form Transaksi Anyar</span>
                            <div>
                                <label class="block text-slate-400 mb-1.5 font-medium">Pilih Peralatan Studio:</label>
                                <select class="w-full bg-slate-900 border border-slate-800 rounded-lg p-2.5 text-white font-medium focus:border-amber-500/50 focus:ring-0">
                                    <option>Sony Alpha A7 IIC (Ready)</option>
                                    <option>MacBook Pro M3 (Ready)</option>
                                    <option>Epson EB-X400 (Ready)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-slate-400 mb-1.5 font-medium">Tanggal Mulai Sewa:</label>
                                <input type="date" value="2026-06-25" class="w-full bg-slate-900 border border-slate-800 rounded-lg p-2.5 text-white font-mono focus:border-amber-500/50 focus:ring-0">
                            </div>
                            <button class="w-full bg-gradient-to-r from-amber-600 to-amber-500 hover:from-amber-500 hover:to-amber-400 text-slate-950 font-black py-3 rounded-lg shadow-lg shadow-amber-500/5 transition duration-200 uppercase tracking-wider text-[11px]">
                                Check Availability & Sewa
                            </button>
                        </div>

                        <!-- Calendar Status DB Sync View -->
                        <div class="bg-slate-950 border border-slate-800 p-5 rounded-xl lg:col-span-2 flex flex-col justify-between text-xs">
                            <div>
                                <span class="text-slate-400 font-bold uppercase text-[10px] tracking-wider font-mono block mb-3.5">Live Status Lock Database Engine:</span>
                                <div class="space-y-3 font-mono">
                                    <div class="p-3 bg-red-950/20 border border-red-900/30 rounded-xl flex flex-col sm:flex-row justify-between sm:items-center gap-2 text-red-300">
                                        <div class="flex items-center gap-2">
                                            <span>🔒</span>
                                            <span class="font-bold">Sony Alpha A7 IIC</span>
                                        </div>
                                        <span class="text-[10px] bg-red-900/40 border border-red-800 px-2.5 py-0.5 rounded-md text-red-200 font-bold">Ter-Booking (21 Juni - 23 Juni 2026)</span>
                                    </div>
                                    <div class="p-3 bg-emerald-950/20 border border-emerald-900/30 rounded-xl flex flex-col sm:flex-row justify-between sm:items-center gap-2 text-emerald-300">
                                        <div class="flex items-center gap-2">
                                            <span>🟢</span>
                                            <span class="font-bold">MacBook Pro M3</span>
                                        </div>
                                        <span class="text-[10px] text-emerald-400">Kosong (Bisa Di-booking Melalui Query Backend)</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-[10px] text-slate-600 mt-4 border-t border-slate-900 pt-3 italic font-sans">Sistem proteksi real-time nyegah kedadeyan double-booking 100% akurat.</p>
                        </div>
                    </div>
                </div>

                <!-- Bagian 3: Riwayat & Rating Constraint -->
                <div class="bg-slate-900/30 border border-slate-800/80 p-6 rounded-2xl shadow-xl">
                    <div class="border-b border-slate-800 pb-4 mb-6">
                        <h2 class="text-lg font-bold text-white flex items-center gap-2">
                            <span class="h-3 w-1.5 bg-yellow-500 rounded-full block"></span>
                            3. Riwayat Penyewaan & Kontrol Aktivasi Aturan Tombol Rating
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Aturan Sistem: Tombol rating lintang 1-5 mung bakal aktif lan biso diklik yen status transaksi wis diowahi dadi "Selesai" dening pegawai.</p>
                    </div>

                    <div class="space-y-4 text-xs">
                        <!-- Baris Terkunci -->
                        <div class="bg-slate-950 border border-slate-800/60 p-4 rounded-xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 hover:border-slate-700 transition">
                            <div>
                                <h4 class="font-bold text-slate-200 text-sm">Sewa Kamera Sony Alpha A7 IIC</h4>
                                <p class="text-slate-500 font-mono text-[11px] mt-0.5">ID Transaksi: TRX-20260610 | Tanggal Sewa: 10 Juni 2026</p>
                            </div>
                            <div class="flex items-center gap-4 w-full sm:w-auto justify-between sm:justify-end">
                                <span class="bg-slate-900 border border-slate-800 text-slate-400 px-2.5 py-1 rounded-md font-bold text-[10px] uppercase tracking-wider">Status: Masih Disewa</span>
                                <button disabled class="bg-slate-900 text-slate-600 border border-slate-800 px-4 py-2 rounded-lg font-bold cursor-not-allowed text-[11px]" title="Tombol dikunci ngenteni verifikasi QC pegawai">
                                    🔒 Rating Locked
                                </button>
                            </div>
                        </div>

                        <!-- Baris Terbuka -->
                        <div class="bg-slate-950 border border-slate-800/60 p-4 rounded-xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 hover:border-slate-700 transition">
                            <div>
                                <h4 class="font-bold text-slate-200 text-sm">Sewa Proyektor Epson EB-X400</h4>
                                <p class="text-slate-500 font-mono text-[11px] mt-0.5">ID Transaksi: TRX-20260502 | Tanggal Sewa: 02 Mei 2026</p>
                            </div>
                            <div class="flex items-center gap-4 w-full sm:w-auto justify-between sm:justify-end">
                                <span class="bg-emerald-950/40 border border-emerald-900/60 text-emerald-400 px-2.5 py-1 rounded-md font-bold text-[10px] uppercase tracking-wider">Status: Selesai ✔️</span>
                                <button class="bg-gradient-to-r from-amber-600 to-yellow-600 hover:from-amber-500 hover:to-yellow-500 text-slate-950 font-black px-4 py-2 rounded-lg shadow-md transition duration-200 text-[11px]">
                                    ⭐ Beri Lintang Rating (1-5)
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Aturan Edukasi Risiko -->
                <div class="bg-slate-900/20 border border-slate-800 p-6 rounded-2xl">
                    <h4 class="text-xs font-bold text-red-400 uppercase tracking-widest mb-4 font-mono flex items-center gap-2">
                        <span>⚠️</span> Aturan Manajemen Risiko & Konsekuensi Karusakan Aset Studio
                    </h4>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs font-medium">
                        <div class="bg-slate-950 border border-slate-800/60 p-3.5 rounded-xl">
                            <span class="font-bold text-emerald-400 block mb-1">0% (Kondisi Aman):</span>
                            <span class="text-slate-500 text-[11px]">Barang bali normal, transaksi rampung, bebas denda sanksi.</span>
                        </div>
                        <div class="bg-slate-950 border border-slate-800/60 p-3.5 rounded-xl">
                            <span class="font-bold text-amber-400 block mb-1">&gt;0% lan &lt;50% (Lecet):</span>
                            <span class="text-slate-500 text-[11px]">Dikenakan denda dhuwit adhedhasar bukti upload foto sekang pegawai.</span>
                        </div>
                        <div class="bg-slate-950 border border-slate-800/60 p-3.5 rounded-xl">
                            <span class="font-bold text-red-500 block mb-1">&ge;50% (Rusak Parah):</span>
                            <span class="text-slate-500 text-[11px]">Wajib ganti unit anyar sing padha lan akun otomatis dibekukan (suspend).</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection