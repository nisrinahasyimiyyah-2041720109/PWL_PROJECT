<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Produk::class;

    public function definition()
    {
        $except = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

        return [
            'id' => $this->faker->randomDigitNot($except),
            'kode_produk' => 'PS007',
            'nama_produk' => $this->faker->word,
            'harga_beli' => $this->faker->randomDigit(),
            'harga_jual' => $this->faker->randomDigit(),
            'stok' => $this->faker->randomDigit(),
            'gambar' => $this->faker->url,
            'kategori_id' => 2
        ];
    }
}
