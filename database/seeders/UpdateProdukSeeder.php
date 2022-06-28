<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //melakukan update data produk yang ada dengan kategori buah terlebih dahulu
        DB::table('produks')->update(['kategori_id' => 1]);
    }
}
