<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sayur extends Model
{
    use HasFactory;

    protected $table = 'sayurs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'kategori',
        'harga',
        'stok',
        'gambar',
    ];
}
