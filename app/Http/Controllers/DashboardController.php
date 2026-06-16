<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung total jenis barang/alat studio di gudang
        $totalBarang = Barang::count();

        // 2. Hitung jumlah transaksi yang statusnya masih 'Disewa'
        $transaksiAktif = Transaksi::where('status_sewa', 'Disewa')->count();

        // 3. Hitung total denda yang berhasil dikumpulkan dari proses QC pengembalian
        $totalDenda = Transaksi::sum('total_denda');

        // 4. Ambil 5 riwayat transaksi terbaru untuk ditampilkan di dashboard
        $riwayatTerbaru = Transaksi::with('barang')->orderBy('created_at', 'desc')->take(5)->get();

        // Kirim semua data ke view dashboard.blade.php
        return view('dashboard', compact('totalBarang', 'transaksiAktif', 'totalDenda', 'riwayatTerbaru'));
    }
}