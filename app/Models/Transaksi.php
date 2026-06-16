<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Mendaftarkan semua kolom agar diizinkan menyimpan data (Mass Assignment)
    protected $fillable = [
        'user_id',
        'barang_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'jumlah_sewa',
        'status_sewa',
        'persentase_kerusakan',
        'total_denda',
        'status_sanksi',
    ];

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