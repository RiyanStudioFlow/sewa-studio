<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    /**
     * Trik Sakti: Nggae $guarded kosong ben kabeh kolom (termasuk status_sewa, 
     * nama_penyewa, dll) oleh mlebu lan disimpen nang database tanpa diblokir Laravel.
     */
    protected $guarded = [];

    /**
     * Relasi ke model Barang (Satu transaksi memiliki satu barang/alat studio)
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    /**
     * Relasi ke model User (Mencatat admin/pegawai mana yang memproses)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}