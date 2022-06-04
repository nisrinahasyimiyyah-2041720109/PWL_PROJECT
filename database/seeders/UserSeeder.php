<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
                'name' => 'Nisrina Hasyimiyyah',
                'email' => 'nisrina@gmail.com',
                'password' => bcrypt('12345678'),
                'alamat' => 'Batu',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '081435666098',
                'level' => 1,
            ],
            [
                'name' => 'Khairun Nisa',
                'email' => 'nisa@gmail.com',
                'password' => bcrypt('87654321'),
                'alamat' => 'Malang',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '085623009871',
                'level' => 1,
            ],
            [
                'name' => 'Mahardika Benedict',
                'email' => 'mahardika@gmail.com',
                'password' => bcrypt('11111111'),
                'alamat' => 'Kediri',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '081879578911',
                'level' => 2,
            ],
            [
                'name' => 'Dika Firmasnyah',
                'email' => 'dika@gmail.com',
                'password' => bcrypt('22222222'),
                'alamat' => 'Sidoarjo',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '085672338140',
                'level' => 2,
            ]
        ];
        DB::table('users')->insert($data);
    }
}
