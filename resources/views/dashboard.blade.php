<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Studio Flow</title>
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
                    <nav class="space-y-1">
                        <a href="/dashboard" class="flex items-center space-x-3 px-3 py-2.5 bg-[#4f46e5] text-white font-bold text-xs rounded-xl shadow-lg">
                            <i class="fa-solid fa-chart-pie text-sm"></i>
                            <span>Dashboard</span>
                        </a>

                        @if(auth()->user()->role == 'admin')
                            <a href="/barang" class="flex items-center space-x-3 px-3 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/30 font-bold text-xs rounded-xl">
                                <i class="fa-solid fa-box text-sm"></i>
                                <span>Kelola Barang</span>
                            </a>

                            <a href="/admin/transaksi" class="flex items-center space-x-3 px-3 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/30 font-bold text-xs rounded-xl">
                                <i class="fa-solid fa-rotate-left text-sm"></i>
                                <span>Kelola Pengembalian</span>
                            </a>
                        @else
                            <a href="/admin/transaksi/create" class="flex items-center space-x-3 px-3 py-2.5 text-emerald-400 hover:text-white hover:bg-emerald-600/20 font-bold text-xs rounded-xl border border-emerald-500/20 mt-4 transition-all">
                                <i class="fa-solid fa-cart-plus text-sm"></i>
                                <span>+ Cari & Sewa Alat</span>
                            </a>
                        @endif
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
                <h1 class="text-base font-bold text-white tracking-tight">Ringkasan Statistik Studio</h1>
                <p class="text-[11px] text-slate-500 font-medium mt-0.5">Pantau status ketersediaan barang dan riwayat inspeksi alat studio secara real-time.</p>
            </div>
        </header>

        <div class="p-8 flex-grow space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-[#1a2232] border border-slate-800 p-6 rounded-2xl shadow-md">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Total Aset Studio</p>
                            <h3 class="text-2xl font-black text-white mt-1">{{ $totalBarang }}</h3>
                        </div>
                        <div class="w-10 h-10 bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 rounded-xl flex items-center justify-center text-lg">
                            <i class="fa-solid fa-box"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1a2232] border border-slate-800 p-6 rounded-2xl shadow-md">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Sewa Berjalan (Aktif)</p>
                            <h3 class="text-2xl font-black text-amber-400 mt-1">{{ $transaksiAktif }}</h3>
                        </div>
                        <div class="w-10 h-10 bg-amber-500/10 border border-amber-500/20 text-amber-400 rounded-xl flex items-center justify-center text-lg">
                            <i class="fa-solid fa-rotate"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1a2232] border border-slate-800 p-6 rounded-2xl shadow-md">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Kas Denda QC</p>
                            <h3 class="text-2xl font-black text-emerald-400 mt-1">Rp {{ number_format($totalDenda, 0, ',', '.') }}</h3>
                        </div>
                        <div class="w-10 h-10 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl flex items-center justify-center text-lg">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="bg-[#1a2232] border border-slate-800 rounded-2xl p-6 shadow-md">
                <div class="border-b border-slate-800 pb-4 mb-4 flex items-center space-x-2">
                    <i class="fa-solid fa-clock-rotate-left text-indigo-500 text-xs"></i>
                    <span class="text-xs font-bold text-slate-300 uppercase tracking-wider">Aktivitas Transaksi Terakhir</span>
                </div>
                <div class="space-y-3">
                    @forelse($riwayatTerbaru as $rw)
                        <div class="flex justify-between items-center p-3 bg-[#121824] border border-slate-800/60 rounded-xl hover:border-slate-700/80 transition-all text-xs">
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 rounded-full {{ $rw->status_sewa == 'Disewa' ? 'bg-amber-400' : 'bg-emerald-400' }}"></div>
                                <div>
                                    <p class="font-bold text-white">{{ $rw->barang->nama_barang ?? $rw->barang->nama ?? 'Unit Tidak Diketahui' }}</p>
                                    <p class="text-[10px] text-slate-500 mt-0.5">Jumlah: {{ $rw->jumlah_sewa }} Unit • Tanggal Pinjam: {{ \Carbon\Carbon::parse($rw->tanggal_mulai)->format('d M Y') }}</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-wider {{ $rw->status_sewa == 'Disewa' ? 'text-amber-400' : 'text-emerald-400' }}">
                                {{ $rw->status_sewa }}
                            </span>
                        </div>
                    @empty
                        <div class="text-center text-slate-500 text-xs py-6 flex flex-col items-center justify-center space-y-2">
                            <i class="fa-solid fa-folder-open text-xl text-slate-700"></i>
                            <p>Belum ada aktivitas transaksi terekam di database.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

        <footer class="bg-[#1a2232] border-t border-slate-800 text-center py-3.5 text-[10px] font-bold text-slate-500 tracking-wider uppercase">
            &copy; 2026 Studio Flow • Premium Dark Dashboard
        </footer>
    </main>

</body>
</html>