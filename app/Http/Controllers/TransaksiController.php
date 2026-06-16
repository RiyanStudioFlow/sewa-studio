<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // 1. Menampilkan halaman utama Kelola Pengembalian / Daftar Transaksi
    public function index()
    {
        // Mengambil semua transaksi beserta data barangnya
        $transaksis = Transaksi::with('barang')->orderBy('created_at', 'desc')->get();
        return view('admin.Transaksi.index', compact('transaksis'));
    }

    // 2. Menampilkan halaman form input transaksi sewa baru
    public function create()
    {
        // Mengambil semua data barang dari database agar muncul di pilihan option select
        $barangs = Barang::all();
        return view('admin.Transaksi.create', compact('barangs'));
    }

    // 3. Menyimpan data transaksi sewa baru ke database + potong stok
    public function simpanSewa(Request $request)
    {
        // Validasi input form
        $request->validate([
            'barang_id'       => 'required',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date',
            'jumlah_sewa'     => 'required|integer|min:1',
        ]);

        // Cek ketersediaan stok barang fisik di gudang
        $barang = Barang::findOrFail($request->barang_id);
        if ($barang->stok < $request->jumlah_sewa) {
            return redirect()->back()->with('error', 'Stok alat studio tidak mencukupi untuk jumlah sewa ini!');
        }

        // Kurangi stok barang di gudang secara otomatis
        $barang->stok = $barang->stok - $request->jumlah_sewa;
        $barang->save();

        // Simpan baris transaksi baru ke database beserta ID pengguna login
        Transaksi::create([
            'user_id'         => auth()->id(), // Menangkap ID admin/user yang sedang login
            'barang_id'       => $request->barang_id,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'jumlah_sewa'     => $request->jumlah_sewa,
            'status_sewa'     => 'Disewa',
        ]);

        return redirect('/admin/transaksi')->with('sukses', 'Transaksi sewa baru berhasil dicatat dan stok alat telah diperbarui!');
    }

   // 4. Memproses QC pengembalian alat studio + hitung denda + kembalikan stok
    public function prosesPengembalian(Request $request, $id)
    {
        // Cari data transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Update data transaksi dengan detail QC pengembalian (Baris status_sanksi dihapus agar tidak bentrok dengan tipe database)
        $transaksi->update([
            'status_sewa'          => 'Selesai', 
            'persentase_kerusakan' => $request->persentase_kerusakan ?? 0,
            'total_denda'          => $request->total_denda ?? 0,
        ]);

        // Kembalikan stok barang yang dipinjam ke gudang semula
        $barang = Barang::find($transaksi->barang_id);
        if ($barang) {
            $barang->stok = $barang->stok + $transaksi->jumlah_sewa; // Stok bertambah kembali
            $barang->save();
        }

        return redirect('/admin/transaksi')->with('sukses', 'Alat studio telah berhasil dikembalikan dan stok diperbarui!');
    }
}