<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_penjual',
        'id_pembeli',
        'id_pasar',
        'id_wallet',
        'jumlah',
        'harga_awalan',
        'harga_akhir',
        'tanggal',
        'jenis_transaksi',
        'status_transaksi',
    ];

    /**
     * Relasi ke User sebagai Penjual
     */
    public function penjual()
    {
        return $this->belongsTo(User::class, 'id_penjual', 'id_user');
    }

    /**
     * Relasi ke User sebagai Pembeli
     */
    public function pembeli()
    {
        return $this->belongsTo(User::class, 'id_pembeli', 'id_user');
    }

    /**
     * Relasi ke Pasar
     */
    public function pasar()
    {
        return $this->belongsTo(Pasar::class, 'id_pasar', 'id_pasar');
    }
}