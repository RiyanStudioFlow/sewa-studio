<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Pake updateOrCreate ben lek akun wis ono nang MySQL, gak nabrak/error maneh
        
        // 1. AKUN ADMIN
        User::updateOrCreate(
            ['email' => 'admin123@gmail.com'], // Patokane email
            [
                'name' => 'Admin LensFlow Studio',
                'password' => Hash::make('rahasia456'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // 2. AKUN PELANGGAN
        User::updateOrCreate(
            ['email' => 'pelanggan@gmail.com'], // Patokane email
            [
                'name' => 'Riyan Pelanggan',
                'password' => Hash::make('pelanggan123'),
                'role' => 'pelanggan',
                'email_verified_at' => now(),
            ]
        );
    }
}