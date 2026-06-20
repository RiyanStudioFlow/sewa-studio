<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Fitur updateOrCreate iki paling aman. 
        // Lek akun wis ana, bakal di-update. Lek durung, bakal digawe. Gak bakal eror nabrak.
        
        // 1. AKUN UTAMA ADMIN
        User::updateOrCreate(
            ['email' => 'admin123@gmail.com'], // Sing digoleki email e
            [
                'name' => 'Admin LensFlow Studio',
                'password' => Hash::make('rahasia456'), 
                'role' => 'admin', 
            ]
        );

        // 2. AKUN PELANGGAN BIASA
        User::updateOrCreate(
            ['email' => 'pelanggan@gmail.com'],
            [
                'name' => 'Riyan Pelanggan',
                'password' => Hash::make('pelanggan123'), 
                'role' => 'pelanggan',
            ]
        );
    }
}