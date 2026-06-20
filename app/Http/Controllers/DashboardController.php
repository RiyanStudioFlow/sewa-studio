<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema; // <-- Diimport kanggo ngecek kolom database

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung total jenis barang/alat studio di gudang
        $totalBarang = Barang::count();

        // 2. Hitung jumlah transaksi yang statusnya masih 'Disewa'
        $transaksiAktif = Transaksi::where('status_sewa', 'Disewa')->count();

        // 3. PROTEKSI: Hitung total denda mung yen kolom 'total_denda' pancen ana nang database
        $totalDenda = 0;
        if (Schema::hasColumn('transaksis', 'total_denda')) {
            $totalDenda = Transaksi::sum('total_denda');
        } else if (Schema::hasColumn('transaksis', 'denda')) { // Nek jenenge kolom mung 'denda'
            $totalDenda = Transaksi::sum('denda');
        }

        // 4. Ambil 5 riwayat transaksi terbaru untuk ditampilkan di dashboard
        $riwayatTerbaru = Transaksi::with('barang')->orderBy('created_at', 'desc')->take(5)->get();

        // Kirim semua data ke view dashboard.blade.php
        return view('dashboard', compact('totalBarang', 'transaksiAktif', 'totalDenda', 'riwayatTerbaru'));
    }
}