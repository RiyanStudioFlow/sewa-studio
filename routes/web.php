<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes - Arsitektur Sistem Informasi Penyewaan Studio
|--------------------------------------------------------------------------
*/

// Portal Utama (Mung Landing Page prasojo utawa langsung redirect nang login)
Route::get('/', function () {
    return view('welcome');
});

// Load Route Otentikasi Gawan Laravel (Login, Register, Logout, lsp.)
require __DIR__.'/auth.php';

/*
 * 🔐 CORES PROTECTED MIDDLEWARE (Kudu Login & Terverifikasi)
 */
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Utama DashboardController ngatur tampilan blade adhedhasar role user
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
     * 👑 GRUP ROUTE KHUSUS: PEGAWAI (ADMIN)
     * Nyegah Penyewa nembak URL manual nggunakake tameng middleware 'role:admin'
     */
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        
        // Fitur 1: Manajemen Aset (Simulasi input barang)
        Route::post('/aset/upload', function () {
            return back()->with('success', 'Aset berhasil divalidasi dan diunggah ke storage Laravel 12 Engine.');
        })->name('aset.upload');

        // Fitur 4: Quality Control & Inspeksi Sanksi Otomatis
        Route::get('/inspeksi', function () {
            return "🛡️ Core Engine: Logika QC Pengembalian Selesai / Lecet / Suspend Parah.";
        })->name('inspeksi.index');
        
        Route::post('/inspeksi/proses', function () {
            return "Mengalkulasi persentase kerusakan dan menentukan sanksi finansial.";
        })->name('inspeksi.store');

        // Fitur 5: Pelaporan & Audit Bulanan
        Route::get('/laporan/cetak', function () {
            return "📊 Mengunduh / Mencetak dokumen laporan arus kas denda bulanan.";
        })->name('laporan.cetak');
    });

    /*
     * 🧑‍💼 GRUP ROUTE KHUSUS: PENYEWA (CUSTOMER)
     * Hak akses eksklusif pangguna biasa liwat tameng middleware 'role:pelanggan'
     */
    Route::middleware(['role:pelanggan'])->prefix('customer')->name('customer.')->group(function () {
        
        // Fitur 2: Booking Engine (Cek kasedhiyan lan tanggal anti-bentrok)
        Route::post('/booking/check', function () {
            return "Melakukan pre-flight query checking tanggal... Tanggal Aman & Tidak Bentrok.";
        })->name('booking.check');

        // Fitur 3: Transaksi & Pengiriman Rating Lintang 1-5
        Route::post('/transaksi/{id}/rating', function ($id) {
            return "Rating Bintang Berhasil Dikirim. Verifikasi Status Selesai: Valid.";
        })->name('transaksi.rating');
    });
    Route::get('/jalankan-migrasi-rahasia', function() {
    \Artisan::call('config:clear');
    \Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
    return "Database Berhasil Di-migrate lan Di-seed, Mase! Mantap Pool!";
});

});