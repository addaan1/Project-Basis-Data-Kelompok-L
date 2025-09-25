<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan oleh model ini
    protected $table = 'e_wallets';

    // Tentukan primary key yang sesuai dengan tabel
    protected $primaryKey = 'id_wallet';

    protected $fillable = [
        'saldo',
        'keterangan',
        'id_user',
    ];

    /* Relasi ke User */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
