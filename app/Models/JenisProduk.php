<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Produk;

class JenisProduk extends Model
{
    protected $table = 'jenis_produks';

    protected $fillable = [
        'nama_jenis',
        'user_id',
    ];

    /**
     * Relasi Jenis Produk ke User.
     */
    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    /**
     * Relasi Jenis Produk ke Produk.
     */
    public function produks()
    {
        return $this->hasMany(
            Produk::class,
            'jenis_produk_id',
            'id'
        );
    }
}
