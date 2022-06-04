<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
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
                'kode_pelanggan' => 'KP0001',
                'nama' => 'Ririn Purnamasari',
                'alamat' => 'Batu',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '081435666098'
            ],
            [
                'kode_pelanggan' => 'KP0002',
                'nama' => 'Indah Lestari',
                'alamat' => 'Malang',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '085623009871'
            ],
            [
                'kode_pelanggan' => 'KP0003',
                'nama' => 'Mahardika Benedict',
                'alamat' => 'Kediri',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '081879578911'
            ],
            [
                'kode_pelanggan' => 'KP0004',
                'nama' => 'Dika Firmasnyah',
                'alamat' => 'Sidoarjo',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '085672338140'
            ],
            [
                'kode_pelanggan' => 'KP0005',
                'nama' => 'Marcella Anastasya',
                'alamat' => 'Jakarta',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '082500128922'
            ],
            [
                'kode_pelanggan' => 'KP0006',
                'nama' => 'Nandita Nur Cahyani',
                'alamat' => 'Lamongan',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '085109234878'
            ],
            [
                'kode_pelanggan' => 'KP0007',
                'nama' => 'Michel Susanto',
                'alamat' => 'Blitar',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '082988012945'
            ],
            [
                'kode_pelanggan' => 'KP0008',
                'nama' => 'Ahmad Ferrorizka',
                'alamat' => 'Batu',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '081985421048'
            ],
            [
                'kode_pelanggan' => 'KP0009',
                'nama' => 'Zakia Muyasaroh',
                'alamat' => 'Pemalang',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '085120984761'
            ],
            [
                'kode_pelanggan' => 'KP0010',
                'nama' => 'Cantika Fitri Anjani',
                'alamat' => 'Cirebon',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '082312098711'
            ],
            [
                'kode_pelanggan' => 'KP0011',
                'nama' => 'Angelica Humairoh',
                'alamat' => 'Jakarta',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '089771901283'
            ],
            [
                'kode_pelanggan' => 'KP0012',
                'nama' => 'Rey Ramadhana',
                'alamat' => 'Sidoarjo',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '081821998056'
            ],
            [
                'kode_pelanggan' => 'KP0013',
                'nama' => 'Andika Saputra',
                'alamat' => 'Malang',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '085437655918'
            ],
            [
                'kode_pelanggan' => 'KP0014',
                'nama' => 'Veronika Almira',
                'alamat' => 'Bogor',
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '085988901865'
            ],
            [
                'kode_pelanggan' => 'KP0015',
                'nama' => 'Evan Ardiansyah',
                'alamat' => 'Tangerang',
                'jenis_kelamin' => 'Laki-Laki',
                'nomor_telepon' => '082761802388'
            ]
        ];
        DB::table('pelanggans')->insert($data);
    }
}
