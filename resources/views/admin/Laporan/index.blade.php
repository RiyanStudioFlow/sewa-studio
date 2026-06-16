<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan - Studio Flow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#121824] text-slate-300 font-sans min-h-screen flex text-sm">

    <aside class="w-64 bg-[#1a2232] flex flex-col justify-between fixed h-full z-10 border-r border-slate-800">
        <div>
            <div class="p-6 border-b border-slate-800 flex items-center space-x-3">
                <div class="w-9 h-9 bg-[#6366f1] rounded-xl flex items-center justify-center text-white shadow-lg">
                    <i class="fa-solid fa-cube text-sm"></i>
                </div>
                <div>
                    <h2 class="text-xs font-black text-white uppercase tracking-wider">Studio Flow</h2>
                    <p class="text-[9px] text-slate-500 font-bold tracking-widest uppercase">Sewa & Inspeksi</p>
                </div>
            </div>

            <div class="p-4 space-y-6">
                <div>
                    <span class="px-3 text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-2">Menu Utama</span>
                    <nav class="space-y-1">
                        <a href="/dashboard" class="flex items-center space-x-3 px-3 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/30 font-bold text-xs rounded-xl transition-all">
                            <i class="fa-solid fa-chart-pie text-sm"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="/barang" class="flex items-center space-x-3 px-3 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/30 font-bold text-xs rounded-xl transition-all">
                            <i class="fa-solid fa-box text-sm"></i>
                            <span>Kelola Barang</span>
                        </a>
                        <a href="/admin/transaksi" class="flex items-center space-x-3 px-3 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/30 font-bold text-xs rounded-xl transition-all">
                            <i class="fa-solid fa-rotate-left text-sm"></i>
                            <span>Kelola Pengembalian</span>
                        </a>
                    </nav>
                </div>
                <div>
                    <span class="px-3 text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-2">Laporan & Keuangan</span>
                    <nav class="space-y-1">
                        <a href="/admin/laporan" class="flex items-center space-x-3 px-3 py-2.5 bg-[#6366f1] text-white font-bold text-xs rounded-xl shadow-lg">
                            <i class="fa-solid fa-file-invoice-dollar text-sm"></i>
                            <span>Laporan Keuangan</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="p-4 border-t border-slate-800">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center space-x-2 py-2.5 bg-rose-600/20 hover:bg-rose-600 text-rose-400 hover:text-white border border-rose-500/20 font-bold text-xs rounded-xl uppercase tracking-wider transition-all cursor-pointer">
                    <i class="fa-solid fa-power-off text-xs"></i>
                    <span>Keluar Sistem</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-grow pl-64 min-h-screen flex flex-col justify-between bg-[#121824]">
        <header class="bg-[#1a2232]/80 backdrop-blur-md border-b border-slate-800 px-8 py-5 flex justify-between items-center sticky top-0 z-20">
            <div>
                <h1 class="text-base font-bold text-white tracking-tight">Laporan Keuangan & Arsip Inspeksi</h1>
                <p class="text-[11px] text-slate-500 font-medium mt-0.5">Seluruh rekapitulasi denda, sanksi, dan riwayat alat studio yang telah selesai di-QC.</p>
            </div>
            <button onclick="window.print()" class="flex items-center space-x-2 bg-slate-800 hover:bg-slate-700 text-white px-4 py-2.5 font-bold text-xs rounded-xl shadow-md border border-slate-700 transition-all cursor-pointer">
                <i class="fa-solid fa-print text-xs"></i>
                <span>Cetak Laporan</span>
            </button>
        </header>

        <div class="p-8 flex-grow space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-[#1a2232] border border-slate-800 p-5 rounded-2xl shadow-sm flex justify-between items-center">
                    <div>
                        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Total Pendapatan Denda QC</p>
                        <h3 class="text-xl font-black text-emerald-400 mt-1">Rp {{ number_format($totalPendapatanDenda, 0, ',', '.') }}</h3>
                    </div>
                    <div class="w-9 h-9 bg-emerald-500/10 text-emerald-400 rounded-xl flex items-center justify-center text-sm border border-emerald-500/20">
                        <i class="fa-solid fa-money-bill-wave"></i>
                    </div>
                </div>

                <div class="bg-[#1a2232] border border-slate-800 p-5 rounded-2xl shadow-sm flex justify-between items-center">
                    <div>
                        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Total Aset Sukses Dipulangkan</p>
                        <h3 class="text-xl font-black text-white mt-1">{{ $totalUnitSelesai }} Unit Alat</h3>
                    </div>
                    <div class="w-9 h-9 bg-indigo-500/10 text-indigo-400 rounded-xl flex items-center justify-center text-sm border border-indigo-500/20">
                        <i class="fa-solid fa-handshake-angle"></i>
                    </div>
                </div>
            </div>

            @if($laporanSelesai->isEmpty())
                <div class="w-full bg-[#1a2232] border border-slate-800 rounded-2xl p-12 text-center shadow-md space-y-3">
                    <div class="w-12 h-12 bg-[#121824] border border-slate-800/60 text-slate-600 rounded-full flex items-center justify-center mx-auto text-lg">
                        <i class="fa-solid fa-receipt"></i>
                    </div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Belum Ada Transaksi Selesai</p>
                    <p class="text-[11px] text-slate-500 max-w-sm mx-auto">Laporan akan otomatis terisi setelah ada alat studio yang dikembalikan lewat proses verifikasi QC.</p>
                </div>
            @else
                <div class="bg-[#1a2232] border border-slate-800 rounded-2xl overflow-hidden shadow-md">
                    <div class="p-4 border-b border-slate-800 bg-[#151c2a] text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                        Buku Besar Riwayat Pengembalian Aset
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-slate-800 bg-[#121824] text-[9px] font-bold text-slate-500 uppercase tracking-wider">
                                    <th class="p-4">ID Transaksi</th>
                                    <th class="p-4">Nama Alat Studio</th>
                                    <th class="p-4 text-center">Jumlah Sewa</th>
                                    <th class="p-4 text-center">Kerusakan (%)</th>
                                    <th class="p-4 text-right">Denda QC</th>
                                    <th class="p-4 text-center">Status Sanksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laporanSelesai as $lap)
                                    <tr class="border-b border-slate-800 hover:bg-slate-800/10 transition-all text-xs">
                                        <td class="p-4 font-bold text-slate-500">#{{ $lap->id }}</td>
                                        <td class="p-4 font-bold text-white">{{ $lap->barang->nama_barang ?? $lap->barang->nama }}</td>
                                        <td class="p-4 text-center font-medium text-slate-400">{{ $lap->jumlah_sewa }} Unit</td>
                                        <td class="p-4 text-center font-bold {{ $lap->persentase_kerusakan > 0 ? 'text-rose-400' : 'text-slate-500' }}">
                                            {{ $lap->persentase_kerusakan }}%
                                        </td>
                                        <td class="p-4 text-right font-bold {{ $lap->total_denda > 0 ? 'text-amber-400' : 'text-slate-400' }}">
                                            Rp {{ number_format($lap->total_denda, 0, ',', '.') }}
                                        </td>
                                        <td class="p-4 text-center">
                                            @if($lap->status_sanksi == 'Denda')
                                                <span class="px-2 py-0.5 bg-rose-500/10 text-rose-400 border border-rose-500/20 rounded font-bold text-[9px] uppercase tracking-wider">
                                                    {{ $lap->status_sanksi }}
                                                </span>
                                            @else
                                                <span class="px-2 py-0.5 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded font-bold text-[9px] uppercase tracking-wider">
                                                    {{ $lap->status_sanksi }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>

        <footer class="bg-[#1a2232] border-t border-slate-800 text-center py-3.5 text-[10px] font-bold text-slate-500 tracking-wider uppercase">
            &copy; 2026 Studio Flow • Premium Dark Dashboard
        </footer>
    </main>

</body>
</html>