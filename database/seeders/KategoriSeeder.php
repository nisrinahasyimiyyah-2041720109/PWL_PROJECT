<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            ['nama_kategori' => 'Buah'],
            ['nama_kategori' => 'Sayur'],
        ];

        DB::table('kategoris')->insert($kategori);
    }
}
