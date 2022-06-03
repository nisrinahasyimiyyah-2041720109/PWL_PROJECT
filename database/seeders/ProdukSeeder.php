<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
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
                'kode_produk' => 'PB001',
                'nama_produk' => 'Apel',
                'kategori' => 'Buah',
                'harga_beli' => 18000,
                'harga_jual' => 20000,
                'stok' => 40,
                'gambar' => 'style/img/apel.jpg'
            ],
            [
                'kode_produk' => 'PB002',
                'nama_produk' => 'Jeruk',
                'kategori' => 'Buah',
                'harga_beli' => 22500,
                'harga_jual' => 25000,
                'stok' => 50,
                'gambar' => 'style/img/jeruk.jpg'
            ],
            [
                'kode_produk' => 'PB003',
                'nama_produk' => 'Strawberry',
                'kategori' => 'Buah',
                'harga_beli' => 43000,
                'harga_jual' => 45000,
                'stok' => 100,
                'gambar' => 'style/img/strawberry.jpg'
            ],
            [
                'kode_produk' => 'PB004',
                'nama_produk' => 'Mangga',
                'kategori' => 'Buah',
                'harga_beli' => 28000,
                'harga_jual' => 30000,
                'stok' => 65,
                'gambar' => 'style/img/mangga.jpg'
            ],           
            [
                'kode_produk' => 'PB004',
                'nama_produk' => 'Anggur',
                'kategori' => 'Buah',
                'harga_beli' => 47500,
                'harga_jual' => 50000,
                'stok' => 110,
                'gambar' => 'style/img/anggur.jpg'
            ],
            [
                'kode_produk' => 'PS001',
                'nama_produk' => 'Sawi Hijau',
                'kategori' => 'Sayur',
                'harga_beli' => 18000,
                'harga_jual' => 20000,
                'stok' => 70,
                'gambar' => 'style/img/sawi-hijau.jpg'
            ],
            [
                'kode_produk' => 'PS002',
                'nama_produk' => 'Sawi Putih',
                'kategori' => 'Sayur',
                'harga_beli' => 22000,
                'harga_jual' => 23000,
                'stok' => 65,
                'gambar' => 'style/img/sawi-putih.jpg'
            ],
            [
                'kode_produk' => 'PS003',
                'nama_produk' => 'Brokoli',
                'kategori' => 'Sayur',
                'harga_beli' => 33000,
                'harga_jual' => 35000,
                'stok' => 90,
                'gambar' => 'style/img/brokoli.jpg'
            ],
            [
                'kode_produk' => 'PS004',
                'nama_produk' => 'Wortel',
                'kategori' => 'Sayur',
                'harga_beli' => 10000,
                'harga_jual' => 12000,
                'stok' => 140,
                'gambar' => 'style/img/wortel.jpg'
            ],
            [
                'kode_produk' => 'PS005',
                'nama_produk' => 'Kembang Kol',
                'kategori' => 'Sayur',
                'harga_beli' => 22000,
                'harga_jual' => 25000,
                'stok' => 86,
                'gambar' => 'style/img/kembang-kol.jpg'
            ]
        ];

        DB::table('produks')->insert($data);
    }
}
