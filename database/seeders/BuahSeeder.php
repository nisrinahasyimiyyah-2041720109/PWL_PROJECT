<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuahSeeder extends Seeder
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
                'nama' => 'Apel',
                'kategori' => 'Buah',
                'harga' => 20000,
                'stok' => 40,
                'gambar' => 'style/img/apel.jpg'
            ],
            [
                'nama' => 'Jeruk',
                'kategori' => 'Buah',
                'harga' => 25000,
                'stok' => 50,
                'gambar' => 'style/img/jeruk.jpg'
            ],
            [
                'nama' => 'Strawberry',
                'kategori' => 'Buah',
                'harga' => 45000,
                'stok' => 100,
                'gambar' => 'style/img/strawberry.jpg'
            ],
            [
                'nama' => 'Mangga',
                'kategori' => 'Buah',
                'harga' => 30000,
                'stok' => 65,
                'gambar' => 'style/img/mangga.jpg'
            ],           
            [
                'nama' => 'Anggur',
                'kategori' => 'Buah',
                'harga' => 50000,
                'stok' => 110,
                'gambar' => 'style/img/anggur.jpg'
            ],
            [
                'nama' => 'Jambu Merah',
                'kategori' => 'Buah',
                'harga' => 8000,
                'stok' => 88,
                'gambar' => 'style/img/jambu-merah.jpg'
            ]
        ];

        DB::table('buahs')->insert($data);
    }
}
