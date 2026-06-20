<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController; // <-- Menambahkan Import LaporanController baru
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Sistem Sewa Studio (Studio Flow)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
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
    Route::get('/resik-database-rahasia', function () {
    Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
    return 'Database wis resik lan keisi seeder, mas!';
});
});

require __DIR__.'/auth.php';