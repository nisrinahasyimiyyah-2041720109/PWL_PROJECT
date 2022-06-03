<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_produk',
        'nama_produk',       
        'kategori',
        'harga_beli',
        'harga_jual',
        'stok',
        'gambar',
    ];
}
