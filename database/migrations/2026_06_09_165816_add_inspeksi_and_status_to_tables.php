<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Tambah kolom ke tabel transaksis (Tanpa ->after() agar anti-gagal)
        Schema::table('transaksis', function (Blueprint $table) {
            $table->integer('persentase_kerusakan')->default(0);
            $table->integer('nominal_denda')->default(0);
            $table->string('foto_bukti_kerusakan')->nullable();
            $table->string('sanksi_tambahan')->nullable();
            $table->integer('rating_bintang')->nullable();
            $table->text('ulasan')->nullable();
        });

        // 2. Tambah kolom ke tabel users (Tanpa ->after())
        Schema::table('users', function (Blueprint $table) {
            $table->string('status_akun')->default('Aktif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropColumn([
                'persentase_kerusakan', 
                'nominal_denda', 
                'foto_bukti_kerusakan', 
                'sanksi_tambahan', 
                'rating_bintang', 
                'ulasan'
            ]);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status_akun');
        });
    }
};