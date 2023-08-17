<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('siswas')->insert([
        [
            'id' => '10',
            'nis' => '210304032',
            'nama' => 'Anton',
            'jenis_kelamin' => 'Laki-Laki',
            'tanggal_lahir' => '2017-12-28',
            'umur' => '66 bulan, 23 hari',
        ],
        [
            'id' => '11',
            'nis' => '210304033',
            'nama' => 'Budi',
            'jenis_kelamin' => 'Laki-Laki',
            'tanggal_lahir' =>'2017-12-28',
            'umur' => '66 bulan, 23 hari',
        ],
        [
            'id' => '12',
            'nis' => '210304034',
            'nama' => 'Cakra',
            'jenis_kelamin' => 'Laki-Laki',
            'tanggal_lahir'=> '2017-12-28',
            'umur' => '66 bulan, 23 hari',
        ],
        [
            'id' => '13',
            'nis' => '210304035',
            'nama' => 'Doni',
            'jenis_kelamin' => 'Laki-Laki',
            'tanggal_lahir'=> '2017-12-28',
            'umur' => '66 bulan, 23 hari',
        ],
        [
            'id' => '14',
            'nis' => '210304036',
            'nama' => 'Endra',
            'jenis_kelamin' => 'Laki-Laki',
            'tanggal_lahir'=> '2017-12-28',
            'umur' => '66 bulan, 23 hari',
        ],
        [
            'id' => '15',
            'nis' => '210304037',
            'nama' => 'Fanny',
            'jenis_kelamin' => 'Laki-Laki',
            'tanggal_lahir' =>'2017-12-28',
            'umur' => '66 bulan, 23 hari',
        ],
        [
            'id' => '16',
            'nis' => '210304038',
            'nama' => 'Gilang',
            'jenis_kelamin' => 'Laki-Laki',
            'tanggal_lahir' =>'2017-12-28',
            'umur' => '66 bulan, 23 hari',
        ],
        [
            'id' => '17',
            'nis' => '210304039',
            'nama' => 'Hendra',
            'jenis_kelamin' => 'Laki-Laki',
            'tanggal_lahir' =>'2017-12-28',
            'umur' => '66 bulan, 23 hari',
        ],
        [
            'id' => '18',
            'nis' => '210304040',
            'nama' => 'Ihwan',
            'jenis_kelamin' => 'Laki-Laki',
            'tanggal_lahir' =>'2017-12-28',
            'umur' => '66 bulan, 23 hari',
        ],
        [
            'id' => '19',
            'nis' => '210304041',
            'nama' => 'Joko',
            'jenis_kelamin' => 'Laki-Laki',
            'tanggal_lahir' =>'2017-12-28',
            'umur' => '66 bulan, 23 hari',
        ],
    ]);
    }
}
