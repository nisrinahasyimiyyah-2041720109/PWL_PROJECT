<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_pelanggan',
        'nama',       
        'alamat',
        'jenis_kelamin',
        'nomor_telepon',
    ];
}
