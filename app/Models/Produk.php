<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'user_id',
        'nama',
        'jenis_produk_id',
        'harga_beli',
        'harga_jual',
        'stok',
        'foto',
    ];

    /**
     * Relasi ke user yang menginput produk.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi produk ke jenis produk.
     */
    public function jenisProduk()
    {
        return $this->belongsTo(
            Jenis::class,
            'jenis_produk_id',
            'id'
        );
    }
}