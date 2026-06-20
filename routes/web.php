<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan; 

/*
|--------------------------------------------------------------------------
| Web Routes - Sistem Sewa Studio (Studio Flow)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// ==========================================================================
// 🔥 RUTE EMERGENCY/RAHASIA (Aman saka tabrakan class seeder)
// ==========================================================================
Route::get('/mesti-lancar-jaya', function () {
    try {
        // Meksa server fresh database online lan nginject data seeder gres
        Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
        return '<h1>PROSES SUKSES MASE!</h1><p>Database Railway wis resik gres lan data pancingan wis melbu kabeh. Saiki balika nang rute utama terus jajalen login utawa daftar maneh!</p>';
    } catch (\Exception $e) {
        return 'Waduh eror mase: ' . $e->getMessage();
    }
});

// Semua Route yang Wajib Login (Protected Routes)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // ==========================================
    // 📊 DASHBOARD UTAMA
    // ==========================================
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ==========================================
    // 📦 MANAGEMENT BARANG / ASET
    // ==========================================
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

    // ==========================================
    // 💸 MANAGEMENT TRANSAKSI & INSPEKSI QC
    // ==========================================
    Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi.index');
    Route::get('/admin/transaksi/create', [TransaksiController::class, 'create'])->name('admin.transaksi.create');
    Route::post('/admin/transaksi/simpan', [TransaksiController::class, 'simpanSewa'])->name('admin.transaksi.simpan');
    Route::post('/admin/transaksi/{id}/pengembalian', [TransaksiController::class, 'prosesPengembalian'])->name('transaksi.pengembalian');

    // ==========================================
    // 🧾 LAPORAN KEUANGAN & INSPEKSI ARSIP
    // ==========================================
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');

    // ==========================================
    // 👤 PROFILE & ACCOUNT MANAGEMENT
    // ==========================================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';