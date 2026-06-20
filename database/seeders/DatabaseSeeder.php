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
        // Resikno dhisik ben gak tabrakan unique key
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        if (\Schema::hasTable('admins')) {
            DB::table('admins')->truncate();
        }
        DB::table('barangs')->truncate();
        DB::table('transaksis')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. DAFTARNO PELANGGAN NANG TABEL 'users'
        DB::table('users')->insert([
            'name' => 'Riyan Pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' => Hash::make('pelanggan123'), // 🔥 Akun Pelanggan
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. DAFTARNO ADMIN NANG TABEL 'admins' (Atau sesuaikan rute login adminmu)
        if (\Schema::hasTable('admins')) {
            DB::table('admins')->insert([
                'username' => 'admin_studio',
                'name' => 'Admin LensFlow',
                'email' => 'admin123@gmail.com',
                'password' => Hash::make('rahasia456'), // 🔥 Akun Admin
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 3. Input Data Barang Dummy
        DB::table('barangs')->insert([
            'nama_barang' => 'Sony Alpha A7 IV',
            'kategori' => 'Kamera',
            'stok' => 5,
            'harga_sewa' => 350000,
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}