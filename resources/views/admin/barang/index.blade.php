<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Barang - Studio Flow</title>
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
                        <a href="/barang" class="flex items-center space-x-3 px-3 py-2.5 bg-[#6366f1] text-white font-bold text-xs rounded-xl shadow-lg">
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
                        <a href="/admin/laporan" class="flex items-center space-x-3 px-3 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/30 font-bold text-xs rounded-xl transition-all">
                            <i class="fa-solid fa-file-invoice-dollar text-sm"></i>
                            <span>Laporan Keuangan</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="p-4 border-t border-slate-800">
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
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
                <h1 class="text-base font-bold text-white tracking-tight">Manajemen Inventaris Alat Studio</h1>
                <p class="text-[11px] text-slate-500 font-medium mt-0.5">Tambah, urus stok, dan hapus ketersediaan aset kamera, lighting, atau tripod.</p>
            </div>
        </header>

        <div class="p-8 flex-grow space-y-6">
            
            @if(session('success'))
                <div class="p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-bold rounded-xl flex items-center space-x-2">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-[#1a2232] rounded-2xl p-6 shadow-md border border-slate-800 space-y-4">
                <div class="flex items-center space-x-2 text-slate-300 font-bold text-xs uppercase tracking-wider">
                    <i class="fa-solid fa-circle-plus text-[#6366f1]"></i>
                    <span>Tambah Aset Baru</span>
                </div>
                
                {{-- PERBAIKAN UTAMA: Atribut rute, method, CSRF, dan multipart file upload --}}
                <form action="/barang" method="POST" enctype="multipart/form-data" class="grid grid-cols-4 gap-4">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Nama Alat / Aset</label>
                        <input type="text" name="nama_barang" required placeholder="Contoh: Sony FX3" class="w-full bg-[#121824] border border-slate-800 text-white rounded-xl p-2.5 text-xs focus:ring-2 focus:ring-[#6366f1] focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Kategori</label>
                        <select name="kategori" required class="w-full bg-[#121824] border border-slate-800 text-slate-300 rounded-xl p-2.5 text-xs focus:ring-2 focus:ring-[#6366f1] focus:outline-none">
                            <option value="Kamera">Kamera</option>
                            <option value="Lighting">Lighting</option>
                            <option value="Tripod">Tripod</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Jumlah Stok</label>
                        <input type="number" name="stok" min="1" required placeholder="Kuantitas" class="w-full bg-[#121824] border border-slate-800 text-white rounded-xl p-2.5 text-xs focus:ring-2 focus:ring-[#6366f1] focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Harga Sewa / Hari</label>
                        <input type="number" name="harga_sewa" min="0" required placeholder="Rp" class="w-full bg-[#121824] border border-slate-800 text-white rounded-xl p-2.5 text-xs focus:ring-2 focus:ring-[#6366f1] focus:outline-none">
                    </div>
                    
                    <div class="col-span-4 bg-[#121824] border border-dashed border-slate-800 rounded-xl p-4 flex justify-between items-center">
                        <div class="flex items-center space-x-3 text-xs text-slate-400">
                            <i class="fa-solid fa-image text-lg text-slate-500"></i>
                            <div>
                                <p class="font-bold text-slate-300">Visual Gambar Barang</p>
                                <p class="text-[10px] text-slate-500">Format JPG, JPEG, atau PNG (Maks. 2MB)</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <input type="file" name="foto" class="text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#1a2232] file:text-slate-300 hover:file:bg-slate-700">
                            <button type="submit" class="bg-[#6366f1] hover:bg-[#5356e2] text-white text-xs font-bold uppercase tracking-widest px-6 py-2.5 rounded-xl shadow-lg transition-all">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="bg-[#1a2232] rounded-2xl shadow-md border border-slate-800 overflow-hidden">
                <div class="p-4 bg-[#151c28] text-[10px] font-bold text-slate-500 uppercase tracking-wider grid grid-cols-5">
                    <span class="pl-4">Foto Asli</span>
                    <span>Nama Unit Studio</span>
                    <span>Kategori</span>
                    <span>Stok</span>
                    <span>Harga / Hari</span>
                </div>
                <div class="divide-y divide-slate-800/50">
                    
                    {{-- LOOPING DINAMIS DARI DATABASE --}}
                    @forelse($barangs as $barang)
                        <div class="p-4 grid grid-cols-5 items-center hover:bg-slate-800/20 transition-colors">
                            <div class="pl-4">
                                @if($barang->foto)
                                    <img src="{{ asset('storage/' . $barang->foto) }}" alt="Foto Alat" class="w-12 h-12 object-cover rounded-xl border border-slate-700/60 shadow-md">
                                @else
                                    <div class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center text-slate-500 border border-slate-700/40">
                                        <i class="fa-solid fa-camera text-xs"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="text-xs font-bold text-white">{{ $barang->nama_barang }}</div>
                            <div>
                                <span class="px-2.5 py-0.5 bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-[10px] font-bold rounded-md">
                                    {{ $barang->kategori }}
                                </span>
                            </div>
                            <div class="text-xs font-bold text-slate-400">{{ $barang->stok }} Unit</div>
                            <div class="flex justify-between items-center pr-4">
                                <span class="text-xs font-bold text-emerald-400">Rp {{ number_format($barang->harga_sewa, 0, ',', '.') }}</span>
                                
                                {{-- FORM ACTION HAPUS ASET --}}
                                <form action="/barang/{{ $barang->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus aset ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-400 hover:text-rose-500 text-xs font-bold cursor-pointer">
                                        <i class="fa-solid fa-trash-can mr-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center text-slate-500 text-xs">
                            Belum ada aset terdaftar di dalam database.
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