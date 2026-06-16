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
        // 1. Matikan foreign key check agar proses pembersihan lancar tanpa error 1701
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('transaksis')->truncate();
        DB::table('barangs')->truncate();
        DB::table('users')->truncate();
        
        // Cek jika tabel 'admins' ada di aplikasi kamu, kita bersihkan juga
        if (\Schema::hasTable('admins')) {
            DB::table('admins')->truncate();
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Daftarkan Akun ke Tabel 'users' (Jalur standar Laravel)
        DB::table('users')->insert([
            'name' => 'Admin Studio',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Daftarkan Akun ke Tabel 'admins' (Jalur Login Custom /login-admin kamu)
        if (\Schema::hasTable('admins')) {
            DB::table('admins')->insert([
                'username' => 'admin@gmail.com', // disesuaikan jika fieldnya berbentuk username atau nama
                'name' => 'Admin Studio',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 4. Input Data Barang Dummy (Sesuai kolom database kamu)
        DB::table('barangs')->insert([
            [
                'nama_barang' => 'Sony Alpha A7 IV',
                'kategori' => 'Kamera',
                'stok' => 5,
                'harga_sewa' => 350000,
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Sony ZV-1 Vlogging Camera',
                'kategori' => 'Kamera',
                'stok' => 6,
                'harga_sewa' => 150000,
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Aputure Amaran 200d LED Light',
                'kategori' => 'Lighting',
                'stok' => 6,
                'harga_sewa' => 120000,
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}