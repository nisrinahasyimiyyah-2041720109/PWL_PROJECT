<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanNew extends Model
{
    use HasFactory;

    protected $table = 'penjualans';
    protected $primaryKey = 'id_penjualan';

    protected $fillable = [
        'total_item',
        'total_harga',
        'diskon',
        'bayar',
        'id_user',
        'id_produk',
    ];

    public function produk() 
    {
        return $this->belongsTo(Produk::class, 'id_penjualan');
    }
}
