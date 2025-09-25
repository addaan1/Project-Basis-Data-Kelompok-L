<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama', // Gunakan nama sesuai kolom yang ada di tabel
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Atur primary key
    protected $primaryKey = 'id_user'; 

    // Pastikan auto incrementing
    public $incrementing = true;

    // Tipe data primary key
    protected $keyType = 'int'; 
}
