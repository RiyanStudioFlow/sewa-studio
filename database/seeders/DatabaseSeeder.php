<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. BUAT DATA USER DENGAN ROLE DAN STATUS OTOMATIS
        
        // Akun Pegawai (Admin)
        $admin = User::updateOrCreate(
            ['email' => 'admin@studio.com'],
            [
                'name' => 'Pegawai Administrator',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Akun Pelanggan 1 (Status Aman / Aktif)
        $budi = User::updateOrCreate(
            ['email' => 'budi@gmail.com'],
            [
                'name' => 'Budi Jatmiko',
                'password' => Hash::make('password123'),
                'role' => 'pelanggan',
                'status_akun' => 'aktif', // Field opsional pendukung sistem risiko
                'email_verified_at' => now(),
            ]
        );

        // Akun Pelanggan 2 (Status Kena Denda Lecet)
        $siti = User::updateOrCreate(
            ['email' => 'siti@gmail.com'],
            [
                'name' => 'Siti Rahmawati',
                'password' => Hash::make('password123'),
                'role' => 'pelanggan',
                'status_akun' => 'aktif',
                'email_verified_at' => now(),
            ]
        );

        // Akun Pelanggan 3 (Status Suspend / Daftar Hitam amarga ngerusak alat)
        $riyan = User::updateOrCreate(
            ['email' => 'riyan@gmail.com'],
            [
                'name' => 'Riyan Dimas',
                'password' => Hash::make('password123'),
                'role' => 'pelanggan',
                'status_akun' => 'suspend', // Otomatis dibekukan sesuai logika sistem
                'email_verified_at' => now(),
            ]
        );

        // 2. DATASET SIMULASI UNTUK DASHBOARD ELEGAN (OPSIONAL JIKA MAU DI-RUN KE TABEL)
        // Catatan: Iki kanggo nandani yen arsitektur seeder sampeyan wis siap nyuplai data menyang dashboard premium.
    }
}