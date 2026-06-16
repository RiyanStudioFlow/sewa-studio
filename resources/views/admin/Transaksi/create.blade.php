<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Baru - Studio Flow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#121824] text-slate-300 font-sans min-h-screen flex text-sm">

    <aside class="w-64 bg-[#1a2232] flex flex-col justify-between fixed h-full z-10 border-r border-slate-800">
        <div class="p-6 border-b border-slate-800 flex items-center space-x-3">
            <div class="w-9 h-9 bg-[#6366f1] rounded-xl flex items-center justify-center text-white shadow-lg">
                <i class="fa-solid fa-cube text-sm"></i>
            </div>
            <div>
                <h2 class="text-xs font-black text-white uppercase tracking-wider">Studio Flow</h2>
                <p class="text-[9px] text-slate-500 font-bold tracking-widest uppercase">Sewa & Inspeksi</p>
            </div>
        </div>
    </aside>

    <main class="flex-grow pl-64 min-h-screen flex flex-col justify-between bg-[#121824]">
        <header class="bg-[#1a2232]/80 backdrop-blur-md border-b border-slate-800 px-8 py-5 flex justify-between items-center sticky top-0 z-20">
            <div>
                <h1 class="text-base font-bold text-white tracking-tight">Input Transaksi Sewa Alat</h1>
                <p class="text-[11px] text-slate-500 font-medium mt-0.5">Formulir untuk mencatat penyewaan unit studio oleh pelanggan.</p>
            </div>
        </header>

        <div class="p-8 flex-grow max-w-3xl mx-auto w-full">
            @if(session('error'))
                <div class="mb-4 p-4 bg-rose-500/10 border border-rose-500/20 text-rose-400 rounded-xl font-bold text-xs">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-[#1a2232] rounded-2xl p-6 shadow-md border border-slate-800 space-y-6">
                <form action="{{ route('admin.transaksi.simpan') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1 tracking-wider">Pilih Alat Studio</label>
                        <select name="barang_id" class="w-full bg-[#121824] border border-slate-800 text-white rounded-xl p-2.5 text-xs focus:ring-2 focus:ring-[#6366f1] focus:outline-none" required>
                            <option value="">-- Pilih Alat --</option>
                            @foreach($barangs as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->nama_barang ?? $barang->nama }} (Stok: {{ $barang->stok }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="w-full bg-[#121824] border border-slate-800 text-slate-300 rounded-xl p-2.5 text-xs focus:ring-2 focus:ring-[#6366f1] focus:outline-none" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" class="w-full bg-[#121824] border border-slate-800 text-slate-300 rounded-xl p-2.5 text-xs focus:ring-2 focus:ring-[#6366f1] focus:outline-none" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Jumlah Unit</label>
                            <input type="number" name="jumlah_sewa" value="1" min="1" class="w-full bg-[#121824] border border-slate-800 text-white rounded-xl p-2.5 text-xs focus:ring-2 focus:ring-[#6366f1] focus:outline-none" required>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t border-slate-800">
                        <a href="/admin/transaksi" class="bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white text-xs font-bold uppercase tracking-widest px-6 py-2.5 rounded-xl transition-all">Batal</a>
                        <button type="submit" class="bg-[#6366f1] hover:bg-[#5356e2] text-white text-xs font-bold uppercase tracking-widest px-6 py-2.5 rounded-xl transition-all shadow-lg cursor-pointer">Proses Sewa</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>