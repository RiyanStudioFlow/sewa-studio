<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('barangs')->truncate();
        DB::table('transaksis')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. AKUN UTAMA ADMIN (Ditambahi Role Admin)
        DB::table('users')->insert([
            'name' => 'Admin LensFlow Studio',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('rahasia456'), 
            'role' => 'admin', // 🔥 Iki wajib ben dadi admin!
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. AKUN PELANGGAN BIASA
        DB::table('users')->insert([
            'name' => 'Riyan Pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' => Hash::make('pelanggan123'), 
            'role' => 'pelanggan',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}