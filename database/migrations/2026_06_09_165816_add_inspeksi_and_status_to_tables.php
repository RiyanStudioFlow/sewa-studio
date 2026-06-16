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
        // 1. Tambah kolom spesifikasi dosen ke tabel transaksis
        Schema::table('transaksis', function (Blueprint $table) {
            if (!Schema::hasColumn('transaksis', 'persentase_kerusakan')) {
                $table->integer('persentase_kerusakan')->default(0)->after('status_sewa');
            }
            if (!Schema::hasColumn('transaksis', 'nominal_denda')) {
                $table->integer('nominal_denda')->default(0)->after('persentase_kerusakan');
            }
            if (!Schema::hasColumn('transaksis', 'foto_bukti_kerusakan')) {
                $table->string('foto_bukti_kerusakan')->nullable()->after('nominal_denda');
            }
            if (!Schema::hasColumn('transaksis', 'sanksi_tambahan')) {
                $table->string('sanksi_tambahan')->nullable()->after('foto_bukti_kerusakan');
            }
            if (!Schema::hasColumn('transaksis', 'rating_bintang')) {
                $table->integer('rating_bintang')->nullable()->after('sanksi_tambahan');
            }
            if (!Schema::hasColumn('transaksis', 'ulasan')) {
                $table->text('ulasan')->nullable()->after('rating_bintang');
            }
        });

        // 2. Tambah kolom status_akun ke tabel users (untuk fitur suspend/blacklist)
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'status_akun')) {
                $table->string('status_akun')->default('Aktif')->after('email');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropColumn(['persentase_kerusakan', 'nominal_denda', 'foto_bukti_kerusakan', 'sanksi_tambahan', 'rating_bintang', 'ulasan']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status_akun');
        });
    }
};