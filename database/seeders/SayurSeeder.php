<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SayurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama' => 'Sawi Hijau',
                'kategori' => 'Sayur',
                'harga' => 20000,
                'stok' => 70,
                'gambar' => 'style/img/sawi-hijau.jpg'
            ],
            [
                'nama' => 'Sawi Putih',
                'kategori' => 'Sayur',
                'harga' => 23000,
                'stok' => 65,
                'gambar' => 'style/img/sawi-putih.jpg'
            ],
            [
                'nama' => 'Brokoli',
                'kategori' => 'Sayur',
                'harga' => 35000,
                'stok' => 90,
                'gambar' => 'style/img/brokoli.jpg'
            ],
            [
                'nama' => 'Wortel',
                'kategori' => 'Sayur',
                'harga' => 12000,
                'stok' => 140,
                'gambar' => 'style/img/wortel.jpg'
            ],
            [
                'nama' => 'Kembang Kol',
                'kategori' => 'Sayur',
                'harga' => 25000,
                'stok' => 86,
                'gambar' => 'style/img/kembang-kol.jpg'
            ],
            [
                'nama' => 'Buncis',
                'kategori' => 'Sayur',
                'harga' => 18000,
                'stok' => 100,
                'gambar' => 'style/img/buncis.jpg'
            ]
        ];
        DB::table('sayurs')->insert($data);
    }
}
