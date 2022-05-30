<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buah extends Model
{
    use HasFactory;

    protected $table = 'buahs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'kategori',
        'harga',
        'stok',
        'gambar',
    ];
}
