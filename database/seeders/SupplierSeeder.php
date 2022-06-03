<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SupplierSeeder extends Seeder
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
                'nama' => 'PT. Barokah Indah',
                'alamat' => 'Jl.Kenanga, Blok C, Jakarta',
                'nomor_telepon' => '081339002314',
            ],
            [
                'nama' => 'PT. WeFood',
                'alamat' => 'Jl.Lembong, Bandung',
                'nomor_telepon' => '082593774000',
            ],
            [
                'nama' => 'PT. Sehat ',
                'alamat' => 'Jl.Antapani, Yogyakarta',
                'nomor_telepon' => '081666820125',
            ],
            [
                'nama' => 'PT.Citra Indonesia',
                'alamat' => 'Jl.Taman Sari, Surabaya',
                'nomor_telepon' => '085609233512',
            ],
            [
                'nama' => 'PT. Barokah Jaya',
                'alamat' => 'Jl. Dr. Saleh, Bogor',
                'nomor_telepon' => '085678023991',
            ],
            [
                'nama' => 'PT. Fruit Yeah',
                'alamat' => 'Jl. Tamrin, Situbondo',
                'nomor_telepon' => '082134764544',
            ],
            [
                'nama' => 'PT. Surya Emas',
                'alamat' => 'Jl. Cikondang, Bandung',
                'nomor_telepon' => '081992030411',
            ],
            [
                'nama' => 'PT. Petra Indonesia',
                'alamat' => 'Jl. Embong Brantas, Malang',
                'nomor_telepon' => '082002673912',
            ],
        ];

            DB::table('suppliers')->insert($data);
    }
}
