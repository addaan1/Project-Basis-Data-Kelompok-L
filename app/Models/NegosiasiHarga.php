<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NegosiasiHarga extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_negosiasi';

    protected $fillable = [
        'id_transaksi',
        'id_user_penawar',
        'harga_tawaran',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user_penawar', 'id_user');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }
}
