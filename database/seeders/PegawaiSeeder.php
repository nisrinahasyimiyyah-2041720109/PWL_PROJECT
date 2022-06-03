<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
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
                'nama' => 'Akhmad Rivaldi',
                'alamat' => 'Malang',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '082987152666',
                'jabatan' => 'Manager'
            ],
            [
                'nama' => 'Betari Audiyanti Rahmah',
                'alamat' => 'Bandung',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '081772534192',
                'jabatan' => 'Admin'
            ],
            [
                'nama' => 'Muhammad Hafidz ',
                'alamat' => 'Jakarta',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '082677451002',
                'jabatan' => 'Admin'
            ],
            [
                'nama' => 'Indah Purnama Sari',
                'alamat' => 'Semarang',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '081990657845',
                'jabatan' => 'Kasir'
            ],
            [
                'nama' => 'Naufal Alfarih',
                'alamat' => 'Surabaya',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '085673118994',
                'jabatan' => 'Kasir'
            ],
            [
                'nama' => 'Indra Malik Ahmad',
                'alamat' => 'Surabaya',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '081747629773',
                'jabatan' => 'Karyawan'
            ],
            [
                'nama' => 'Jonathan Alam',
                'alamat' => 'Sidoarjo',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '085672338140',
                'jabatan' => 'Karyawan'
            ],
            [
                'nama' => 'Nindy Raisyah',
                'alamat' => 'Malang',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '082540337613',
                'jabatan' => 'Karyawan'
            ],
        ];

            DB::table('pegawais')->insert($data);
    }
}

