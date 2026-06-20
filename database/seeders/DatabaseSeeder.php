<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. NGAPUS DATA LAWAS BIAR GAK DUPLIKAT / EROR UNIQUE
        // Perintah iki mbusak data pancingan lawas dhisik sakdurunge nggawe sing anyar
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Barang::truncate();
        Transaksi::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. AKUN SAKTI NOMER 1: UTAMA / ADMIN STUDIO
        $admin = User::create([
            'name' => 'Admin LensFlow',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('rahasia456'), // 🔥 Password Admin
            'email_verified_at' => now(),
        ]);

        // 3. AKUN SAKTI NOMER 2: USER / PELANGGAN
        $pelanggan = User::create([
            'name' => 'Riyan Pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' => Hash::make('pelanggan123'), // 🔥 Password Pelanggan
            'email_verified_at' => now(),
        ]);

        // 4. DATA BARANG DUMMY (Supaya Dashboard Gak Kosong & Gak Eror 500)
        $barang1 = Barang::create([
            'nama_barang' => 'Sony Alpha A7 IV',
            'kategori' => 'Kamera',
            'stok' => 5,
            'harga_sewa' => 350000,
            'foto' => null,
        ]);

        $barang2 = Barang::create([
            'nama_barang' => 'Lighting Godox SL60W',
            'kategori' => 'Lighting',
            'stok' => 3,
            'harga_sewa' => 75000,
            'foto' => null,
        ]);

        // 5. DATA TRANSAKSI DUMMY (Kanggo ngisi riwayat transaksi aktif nang dashboard)
        Transaksi::create([
            'barang_id' => $barang1->id,
            'nama_penyewa' => $pelanggan->name,
            'email_penyewa' => $pelanggan->email,
            'durasi' => 3,
            'status_sewa' => 'Disewa'
        ]);
    }
}