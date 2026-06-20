<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Resikno dhisik kabeh tabel ben gak tabrakan unique key
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('barangs')->truncate();
        DB::table('transaksis')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. AKUN UTAMA ADMIN (Dilebokno tabel 'users' ben iso lolos login /login)
        DB::table('users')->insert([
            'name' => 'Admin LensFlow Studio',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('rahasia456'), // 🔥 Password Admin-mu mas!
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. AKUN PELANGGAN BIASA (Pancet nang tabel 'users')
        DB::table('users')->insert([
            'name' => 'Riyan Pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' => Hash::make('pelanggan123'), // 🔥 Password Pelanggan-mu!
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Data Barang Dummy ben dashboard gak kosong lan eror 500
        DB::table('barangs')->insert([
            'nama_barang' => 'Sony Alpha A7 IV',
            'kategori' => 'Kamera',
            'stok' => 5,
            'harga_sewa' => 350000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}