@extends('layouts.app') 

@section('content')
<div class="container mx-auto p-6 text-white bg-gray-950 min-h-screen">

    <!-- HEADER UTAMA PROJECT -->
    <div class="mb-8 border-b border-gray-800 pb-6">
        <span class="bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-md uppercase tracking-wider">Laravel 12 Engine</span>
        <h1 class="text-3xl font-black text-white mt-2">Rancang Bangun Sistem Informasi Penyewaan Peralatan Studio Kreatif Berbasis Web</h1>
        <p class="text-gray-400 text-sm mt-1">Sistem Otomatisasi Jadwal Anti-Bentrok, Inspeksi Quality Control, & Manajemen Risiko Alur Kerja</p>
    </div>

    <!-- ========================================================================= -->
    <!-- 👑 ROLE: PEGAWAI (ADMIN) - KONTROL PANEL MANAJEMEN                        -->
    <!-- ========================================================================= -->
    @if(auth()->user()->role == 'admin')
        
        <!-- ROW STATISTIK UTAMA -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-gray-900 p-5 rounded-xl border border-gray-800 shadow-xl">
                <div class="flex justify-between items-center text-gray-400">
                    <span class="text-xs font-bold uppercase tracking-wider">Total Aset Studio</span>
                    <span class="text-xl">📷</span>
                </div>
                <h3 class="text-3xl font-black mt-2 text-white">4 <span class="text-xs text-gray-500 font-normal">Kamera, Laptop, Proyektor, Speaker</span></h3>
            </div>

            <div class="bg-gray-900 p-5 rounded-xl border border-gray-800 shadow-xl">
                <div class="flex justify-between items-center text-yellow-500">
                    <span class="text-xs font-bold uppercase tracking-wider">Monitoring Jadwal</span>
                    <span class="text-xl">📅</span>
                </div>
                <h3 class="text-3xl font-black mt-2 text-white">0 <span class="text-xs text-gray-500 font-normal">Sewa Berjalan</span></h3>
            </div>

            <div class="bg-gray-900 p-5 rounded-xl border border-gray-800 shadow-xl">
                <div class="flex justify-between items-center text-emerald-400">
                    <span class="text-xs font-bold uppercase tracking-wider">Kas Pendapatan Denda</span>
                    <span class="text-xl">💰</span>
                </div>
                <h3 class="text-3xl font-black mt-2 text-emerald-400">Rp 0</h3>
            </div>

            <div class="bg-gray-900 p-5 rounded-xl border border-red-900 bg-opacity-20 shadow-xl">
                <div class="flex justify-between items-center text-red-400">
                    <span class="text-xs font-bold uppercase tracking-wider">Daftar Hitam (Suspend)</span>
                    <span class="text-xl">🚫</span>
                </div>
                <h3 class="text-3xl font-black mt-2 text-red-500">0 <span class="text-xs text-gray-500 font-normal">User Dibekukan</span></h3>
            </div>
        </div>

        <!-- FITUR 1: MANAJEMEN ASET (UPLOAD BARANG DENGAN VALIDASI STRUKTUR) -->
        <div class="bg-gray-900 p-6 rounded-xl border border-gray-800 shadow-md mb-8">
            <div class="flex justify-between items-center mb-4 border-b border-gray-800 pb-3">
                <h3 class="text-lg font-bold text-indigo-400">1. Manajemen Aset Studio (Validasi Engine Laravel 12)</h3>
                <span class="text-xs bg-gray-800 px-2 py-1 rounded text-gray-400">Strict Validation: Max 2MB, JPG/PNG</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Item 1 -->
                <div class="bg-gray-950 p-4 rounded-lg border border-gray-800 text-center">
                    <div class="w-full h-24 bg-gray-800 rounded mb-2 flex items-center justify-center text-xs text-gray-500">[ Foto Kamera.jpg ]</div>
                    <h5 class="font-bold text-sm text-white">Sony Alpha A7 IIC</h5>
                    <p class="text-xs text-gray-500 mt-1">Stok: 1 Unit | Status: Ready</p>
                </div>
                <!-- Item 2 -->
                <div class="bg-gray-950 p-4 rounded-lg border border-gray-800 text-center">
                    <div class="w-full h-24 bg-gray-800 rounded mb-2 flex items-center justify-center text-xs text-gray-500">[ Foto Laptop.jpg ]</div>
                    <h5 class="font-bold text-sm text-white">MacBook Pro M3</h5>
                    <p class="text-xs text-gray-500 mt-1">Stok: 1 Unit | Status: Ready</p>
                </div>
                <!-- Item 3 -->
                <div class="bg-gray-950 p-4 rounded-lg border border-gray-800 text-center">
                    <div class="w-full h-24 bg-gray-800 rounded mb-2 flex items-center justify-center text-xs text-gray-500">[ Foto Proyektor.jpg ]</div>
                    <h5 class="font-bold text-sm text-white">Epson EB-X400</h5>
                    <p class="text-xs text-gray-500 mt-1">Stok: 1 Unit | Status: Ready</p>
                </div>
                <!-- Item 4 -->
                <div class="bg-gray-950 p-4 rounded-lg border border-gray-800 text-center">
                    <div class="w-full h-24 bg-gray-800 rounded mb-2 flex items-center justify-center text-xs text-gray-500">[ Foto Speaker.jpg ]</div>
                    <h5 class="font-bold text-sm text-white">JBL PartyBox 310</h5>
                    <p class="text-xs text-gray-500 mt-1">Stok: 1 Unit | Status: Ready</p>
                </div>
            </div>
        </div>

        <!-- FITUR 4: INSPEKSI PENGEMBALIAN & MANAJEMEN RISIKO (POINT UTAMA DOSEN) -->
        <div class="bg-gray-900 p-6 rounded-xl border border-gray-800 shadow-md mb-8">
            <div class="mb-4 border-b border-gray-800 pb-3">
                <h3 class="text-lg font-bold text-red-400">4. Simulator Inspeksi Quality Control & Sanksi Otomatis</h3>
                <p class="text-xs text-gray-400 mt-1">Backend Laravel membagi otomatis sanksi denda / suspend akun berdasarkan presentase kerusakan.</p>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-950 text-gray-400 uppercase font-mono border-b border-gray-800">
                        <tr>
                            <th class="p-3">Penyewa</th>
                            <th class="p-3">Alat Studio</th>
                            <th class="p-3 text-center">Input Kerusakan (%)</th>
                            <th class="p-3">Kondisi Sistem Otomatis</th>
                            <th class="p-3">Konsekuensi / Sanksi</th>
                            <th class="p-3">Upload Bukti</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800 bg-gray-950 bg-opacity-40">
                        <!-- Kondisi 1: Aman -->
                        <tr>
                            <td class="p-3 font-medium">Budi Jatmiko</td>
                            <td class="p-3">Sony Alpha A7 IIC</td>
                            <td class="p-3 text-center text-emerald-400 font-bold">0%</td>
                            <td class="p-3"><span class="bg-emerald-950 text-emerald-400 px-2 py-0.5 rounded font-bold">KONDISI AMAN</span></td>
                            <td class="p-3 text-gray-400">Transaksi Selesai, Bebas Denda</td>
                            <td class="p-3 text-gray-600 font-mono text-[10px]">- Tidak Butuh -</td>
                        </tr>
                        <!-- Kondisi 2: Lecet -->
                        <tr>
                            <td class="p-3 font-medium">Siti Rahma</td>
                            <td class="p-3">MacBook Pro M3</td>
                            <td class="p-3 text-center text-yellow-500 font-bold">25%</td>
                            <td class="p-3"><span class="bg-yellow-950 text-yellow-500 px-2 py-0.5 rounded font-bold">KONDISI LECET</span></td>
                            <td class="p-3 text-yellow-200">Dikenakan Denda Uang (Admin Input)</td>
                            <td class="p-3 text-indigo-400 font-semibold underline cursor-pointer">📁 Upload_Bukti_Lecet.jpg</td>
                        </tr>
                        <!-- Kondisi 3: Rusak Parah -->
                        <tr>
                            <td class="p-3 font-medium">Riyan Studio</td>
                            <td class="p-3">JBL PartyBox 310</td>
                            <td class="p-3 text-center text-red-500 font-bold">60%</td>
                            <td class="p-3"><span class="bg-red-950 text-red-400 px-2 py-0.5 rounded font-bold">RUSAK PARAH (&ge;50%)</span></td>
                            <td class="p-3 text-red-400 font-bold">Wajib Ganti Unit Baru & Akun Di-Suspend</td>
                            <td class="p-3 text-gray-600 font-mono text-[10px]">- Akun Diblokir -</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- FITUR 5: PELAPORAN (REPORTING) -->
        <div class="bg-gray-900 p-6 rounded-xl border border-gray-800 shadow-md">
            <h3 class="text-lg font-bold text-emerald-400 mb-4 border-b border-gray-800 pb-3">5. Panel Rekapitulasi Laporan Keuangan Bulanan</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 font-mono text-xs">
                <div class="p-4 bg-gray-950 rounded-lg border border-gray-800">
                    <span class="text-gray-500 block mb-1">TOTAL PENDAPATAN SEWA:</span>
                    <span class="text-xl font-bold text-white">Rp 1.250.000</span>
                </div>
                <div class="p-4 bg-gray-950 rounded-lg border border-gray-800">
                    <span class="text-gray-500 block mb-1">TOTAL MASUK DENDA LECET:</span>
                    <span class="text-xl font-bold text-yellow-500">Rp 350.000</span>
                </div>
                <div class="p-4 bg-gray-950 rounded-lg border border-gray-800">
                    <span class="text-gray-500 block mb-1">DAFTAR HITAM USER (WAJIB GANTI):</span>
                    <span class="text-xl font-bold text-red-500">1 User Aktif</span>
                </div>
            </div>
        </div>


    <!-- ========================================================================= -->
    <!-- 🧑‍💼 ROLE: PENYEWA (CUSTOMER) - INTERFACE BOOKING & TRANSAKSI               -->
    <!-- ========================================================================= -->
    @elseif(auth()->user()->role == 'pelanggan')
        
        <!-- STATUS AKUN OTOMATIS BERDASARKAN MANAJEMEN RISIKO -->
        <div class="bg-gray-900 p-4 rounded-xl border border-gray-800 flex justify-between items-center mb-8">
            <div>
                <h4 class="text-md font-bold">Status Keanggotaan Anda</h4>
                <p class="text-xs text-gray-400 mt-0.5">Sistem memantau riwayat kepatuhan Anda terhadap aset studio.</p>
            </div>
            <span class="bg-emerald-950 text-emerald-400 text-xs font-mono font-bold px-4 py-1.5 rounded-full border border-emerald-800">
                ✔️ STATUS AKUN: AMAN (AKTIF)
            </span>
        </div>

        <!-- FITUR 2: BOOKING SYSTEM & TANGGAL ANTI BENTROK -->
        <div class="bg-gray-900 p-6 rounded-xl border border-gray-800 shadow-md mb-8">
            <div class="mb-4 border-b border-gray-800 pb-3">
                <h3 class="text-lg font-bold text-blue-400">2. Sistem Booking & Penjadwalan Alat Studio (Query Anti-Bentrok)</h3>
                <p class="text-xs text-gray-400 mt-1">Backend Laravel 12 melakukan pre-flight query checking tanggal untuk mencegah double-booking di hari yang sama.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Form Simulasi -->
                <div class="bg-gray-950 p-4 rounded-lg border border-gray-800 space-y-3 text-xs col-span-1">
                    <div>
                        <label class="block text-gray-400 mb-1">Pilih Alat Studio:</label>
                        <select class="w-full bg-gray-900 border border-gray-700 rounded p-2 text-white">
                            <option>Sony Alpha A7 IIC (Ready)</option>
                            <option>MacBook Pro M3 (Ready)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 mb-1">Tanggal Mulai Sewa:</label>
                        <input type="date" value="2026-06-25" class="w-full bg-gray-900 border border-gray-700 rounded p-2 text-white font-mono">
                    </div>
                    <button class="w-full bg-indigo-600 font-bold py-2 rounded text-white shadow hover:bg-indigo-700 transition">
                        Check Availability & Booking
                    </button>
                </div>

                <!-- Tampilan Jadwal Terisi -->
                <div class="bg-gray-950 p-4 rounded-lg border border-gray-800 col-span-2 text-xs">
                    <h5 class="font-bold mb-2 text-gray-300">Live Kalender Blokir Sistem Engine:</h5>
                    <div class="space-y-2 font-mono">
                        <div class="p-2 bg-red-950 bg-opacity-40 rounded border border-red-900 flex justify-between items-center text-red-300">
                            <span>📦 Sony Alpha A7 IIC</span>
                            <span>🔒 Ter-Booking (21 Juni - 23 Juni 2026) -> Otomatis Lock Tanggal</span>
                        </div>
                        <div class="p-2 bg-emerald-950 bg-opacity-40 rounded border border-emerald-900 flex justify-between items-center text-emerald-300">
                            <span>📦 MacBook Pro M3</span>
                            <span>🟢 Kosong (Bisa di-booking via query laravel)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FITUR 3: RIWAYAT TRANSAKSI & RATING VALIDASI SELESAI -->
        <div class="bg-gray-900 p-6 rounded-xl border border-gray-800 shadow-md">
            <div class="mb-4 border-b border-gray-800 pb-3">
                <h3 class="text-lg font-bold text-yellow-500">3. Riwayat Transaksi & Sistem Validasi Tombol Rating</h3>
                <p class="text-xs text-gray-400 mt-1">Sesuai aturan dosen: Tombol rating bintang 1-5 hanya akan aktif (bisa diklik) jika status transaksi sudah diubah menjadi "Selesai" oleh pegawai.</p>
            </div>

            <div class="space-y-3 text-xs">
                <!-- Baris Transaksi 1 -->
                <div class="bg-gray-950 p-4 rounded-lg border border-gray-800 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <div>
                        <h5 class="font-bold text-white">Sewa Sony Alpha A7 IIC</h5>
                        <p class="text-gray-500 font-mono text-[11px] mt-0.5">ID: TRX-20260610 | Tgl: 10 Juni 2026</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="bg-gray-800 text-gray-400 px-2 py-1 rounded font-bold uppercase tracking-wider text-[10px]">Status: Masih Disewa</span>
                        <button disabled class="bg-gray-800 text-gray-600 px-3 py-1.5 rounded font-bold cursor-not-allowed" title="Menunggu verifikasi selesai oleh pegawai">
                            🔒 Beri Rating
                        </button>
                    </div>
                </div>

                <!-- Baris Transaksi 2 -->
                <div class="bg-gray-950 p-4 rounded-lg border border-gray-800 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <div>
                        <h5 class="font-bold text-white">Sewa Proyektor Epson EB-X400</h5>
                        <p class="text-gray-500 font-mono text-[11px] mt-0.5">ID: TRX-20260502 | Tgl: 02 Mei 2026</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="bg-emerald-950 text-emerald-400 px-2 py-1 rounded font-bold uppercase tracking-wider text-[10px]">Status: Selesai ✔️</span>
                        <button class="bg-yellow-600 hover:bg-yellow-500 text-white font-bold px-3 py-1.5 rounded shadow transition">
                            ⭐ Beri Rating (1-5)
                        </button>
                    </div>
                </div>
            </div>
        </div>

    @endif

</div>
@endsection