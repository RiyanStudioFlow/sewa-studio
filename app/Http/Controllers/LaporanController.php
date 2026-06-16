<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // 1. Ambil semua transaksi yang sudah berstatus 'Selesai' (Riwayat pengembalian)
        $laporanSelesai = Transaksi::with('barang')
            ->where('status_sewa', 'Selesai')
            ->orderBy('updated_at', 'desc')
            ->get();

        // 2. Hitung total kas masuk dari denda QC
        $totalPendapatanDenda = $laporanSelesai->sum('total_denda');

        // 3. Hitung total unit yang sukses disewa dan dipulangkan
        $totalUnitSelesai = $laporanSelesai->sum('jumlah_sewa');

        // Kirim data ke view laporan
        return view('admin.laporan.index', compact('laporanSelesai', 'totalPendapatanDenda', 'totalUnitSelesai'));
    }
}