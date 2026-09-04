<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\JenisProduk;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'jenis_produk_id',
        'harga_beli',
        'harga_jual',
        'stok',
        'foto',
        'user_id',
    ];

    /**
     * Relasi Produk ke JenisProduk.
     *
     * produk.jenis_produk_id
     *          ↓
     * jenis_produk.id
     */
    public function jenisProduk()
    {
        return $this->belongsTo(
            JenisProduk::class,
            'jenis_produk_id',
            'id'
        );
    }

    /**
     * Relasi Produk ke User.
     */
    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }
}
