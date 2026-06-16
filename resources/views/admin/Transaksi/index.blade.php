<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengembalian - Studio Flow</title>
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
                        <a href="/admin/transaksi" class="flex items-center space-x-3 px-3 py-2.5 bg-[#6366f1] text-white font-bold text-xs rounded-xl shadow-lg">
                            <i class="fa-solid fa-rotate-left text-sm"></i>
                            <span>Kelola Pengembalian</span>
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
                <h1 class="text-base font-bold text-white tracking-tight">Dashboard Inspeksi & Pengembalian Aset</h1>
                <p class="text-[11px] text-slate-500 font-medium mt-0.5">Silakan lakukan pengecekan fisik unit sebelum memproses pengembalian alat studio.</p>
            </div>
            <a href="/admin/transaksi/create" class="flex items-center space-x-2 bg-[#6366f1] hover:bg-[#5356e2] text-white px-4 py-2.5 font-bold text-xs rounded-xl shadow-lg transition-all">
                <i class="fa-solid fa-plus text-xs"></i>
                <span>Input Transaksi Baru</span>
            </a>
        </header>

        <div class="p-8 flex-grow">
            @if(session('sukses'))
                <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl font-bold text-xs flex items-center space-x-2">
                    <i class="fa-solid fa-circle-check text-base"></i>
                    <span>{{ session('sukses') }}</span>
                </div>
            @endif

            @if($transaksis->isEmpty())
                <div class="flex items-center justify-center h-[60vh]">
                    <div class="w-full max-w-2xl bg-[#1a2232] border border-slate-800 rounded-2xl p-12 text-center shadow-md space-y-4">
                        <div class="w-14 h-14 bg-[#121824] border border-slate-800/60 text-slate-500 rounded-full flex items-center justify-center mx-auto text-xl">
                            <i class="fa-solid fa-folder-open"></i>
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-xs font-bold text-slate-300 uppercase tracking-wider">Tidak Ada Daftar Sewa Aktif</h3>
                            <p class="text-[11px] text-slate-500 max-w-md mx-auto leading-relaxed">Saat ini tidak ada pelanggan yang sedang meminjam atau menjadwalkan peminjaman fisik alat.</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-[#1a2232] border border-slate-800 rounded-2xl overflow-hidden shadow-md">
                    <div class="p-5 border-b border-slate-800 flex items-center space-x-2">
                        <i class="fa-solid fa-list-check text-[#6366f1] text-xs"></i>
                        <span class="text-xs font-bold text-slate-300 uppercase tracking-wider">Daftar Transaksi Aktif</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-slate-800 bg-[#151c2a] text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                                    <th class="p-4">ID</th>
                                    <th class="p-4">Nama Alat Studio</th>
                                    <th class="p-4">Durasi Sewa</th>
                                    <th class="p-4 text-center">Jumlah</th>
                                    <th class="p-4 text-center">Status</th>
                                    <th class="p-4 text-center">Aksi QC</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksis as $transaksi)
                                    <tr class="border-b border-slate-800 hover:bg-slate-800/20 transition-all">
                                        <td class="p-4 text-xs font-bold text-slate-500">#{{ $transaksi->id }}</td>
                                        <td class="p-4 text-xs font-bold text-white">
                                            {{ $transaksi->barang->nama_barang ?? $transaksi->barang->nama ?? 'Unit Tidak Ditemukan' }}
                                        </td>
                                        <td class="p-4 text-xs text-slate-400 font-medium">
                                            {{ \Carbon\Carbon::parse($transaksi->tanggal_mulai)->format('d M Y') }} 
                                            <span class="text-slate-600 mx-1">→</span> 
                                            {{ \Carbon\Carbon::parse($transaksi->tanggal_selesai)->format('d M Y') }}
                                        </td>
                                        <td class="p-4 text-xs text-center font-bold text-slate-300">
                                            {{ $transaksi->jumlah_sewa }} Unit
                                        </td>
                                        <td class="p-4 text-xs text-center">
                                            @if($transaksi->status_sewa == 'Disewa')
                                                <span class="px-2.5 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/20 rounded-lg font-bold text-[10px] uppercase tracking-wider">
                                                    {{ $transaksi->status_sewa }}
                                                </span>
                                            @else
                                                <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-lg font-bold text-[10px] uppercase tracking-wider">
                                                    {{ $transaksi->status_sewa }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="p-4 text-xs text-center">
                                            @if($transaksi->status_sewa == 'Disewa')
                                                <button onclick="bukaModalQC('{{ $transaksi->id }}', '{{ $transaksi->barang->nama_barang ?? $transaksi->barang->nama }}')" class="bg-[#6366f1] hover:bg-[#5356e2] text-white font-bold text-[10px] uppercase tracking-wider px-3 py-1.5 rounded-lg transition-all shadow-md cursor-pointer">
                                                    <i class="fa-solid fa-clipboard-check mr-1"></i> Check Pengembalian
                                                </button>
                                            @else
                                                <span class="text-slate-600 font-bold text-[10px] uppercase tracking-wider">
                                                    <i class="fa-solid fa-check-double text-emerald-500 mr-1"></i> Selesai di-QC
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

        <div id="modalQC" class="hidden fixed inset-0 bg-black/70 flex items-center justify-center z-50 p-4 backdrop-blur-sm">
            <div class="bg-[#1a2232] border border-slate-800 w-full max-w-md rounded-2xl shadow-2xl overflow-hidden p-6 space-y-4">
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <h3 class="text-xs font-bold text-white uppercase tracking-wider flex items-center space-x-2">
                        <i class="fa-solid fa-shield-halved text-indigo-500"></i>
                        <span>Inspeksi Kualitas Alat</span>
                    </h3>
                    <button onclick="tutupModalQC()" class="text-slate-500 hover:text-white transition-all cursor-pointer">
                        <i class="fa-solid fa-xmark text-base"></i>
                    </button>
                </div>

                <form id="formQC" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <p class="text-[11px] text-slate-400 font-medium">Nama Alat:</p>
                        <p id="modalNamaAlat" class="text-xs font-black text-white mt-0.5"></p>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1 tracking-wider">Persentase Kerusakan (%)</label>
                        <input type="number" name="persentase_kerusakan" value="0" min="0" max="100" class="w-full bg-[#121824] border border-slate-800 text-white rounded-xl p-2.5 text-xs focus:ring-2 focus:ring-[#6366f1] focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1 tracking-wider">Total Denda (Rp)</label>
                        <input type="number" name="total_denda" value="0" min="0" class="w-full bg-[#121824] border border-slate-800 text-white rounded-xl p-2.5 text-xs focus:ring-2 focus:ring-[#6366f1] focus:outline-none">
                    </div>

                    <div class="flex justify-end space-x-2 pt-3 border-t border-slate-800">
                        <button type="button" onclick="tutupModalQC()" class="bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white text-[10px] font-bold uppercase tracking-wider px-4 py-2.5 rounded-xl transition-all">Batal</button>
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white text-[10px] font-bold uppercase tracking-wider px-4 py-2.5 rounded-xl transition-all shadow-md cursor-pointer">Konfirmasi Selesai</button>
                    </div>
                </form>
            </div>
        </div>

        <footer class="bg-[#1a2232] border-t border-slate-800 text-center py-3.5 text-[10px] font-bold text-slate-500 tracking-wider uppercase">
            &copy; 2026 Studio Flow • Premium Dark Dashboard
        </footer>
    </main>

    <script>
        function bukaModalQC(id, namaAlat) {
            document.getElementById('modalNamaAlat').innerText = namaAlat;
            document.getElementById('formQC').action = '/admin/transaksi/' + id + '/pengembalian';
            document.getElementById('modalQC').classList.remove('hidden');
        }

        function tutupModalQC() {
            document.getElementById('modalQC').classList.add('hidden');
        }
    </script>
</body>
</html>