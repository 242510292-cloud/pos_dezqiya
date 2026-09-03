<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis_produks';

    protected $fillable = [
        'user_id',
        'nama',
        'deskripsi',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Produk
     */
    public function produks()
    {
        return $this->hasMany(Produk::class, 'jenis_produk_id');
    }
}
