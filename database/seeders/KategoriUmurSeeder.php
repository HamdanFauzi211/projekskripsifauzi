<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class KategoriUmurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_umurs')->insert([
            [
                'id' => '1',
                'kategori_umur' => '0-3 Bulan',
            ],
            [
                'id' => '2',
                'kategori_umur' => '3-6 Bulan',
            ],
            [
                'id' => '3',
                'kategori_umur' => '6-9 Bulan',
            ],
            [
                'id' => '4',
                'kategori_umur' => '9-12 Bulan',
            ],
            [
                'id' => '5',
                'kategori_umur' => '12-18 Bulan',
            ],
            [
                'id' => '6',
                'kategori_umur' => '18-24 Bulan',
            ],
            [
                'id' => '7',
                'kategori_umur' => '24-36 Bulan',
            ],
            [
                'id' => '8',
                'kategori_umur' => '36-48 Bulan',
            ],
            [
                'id' => '9',
                'kategori_umur' => '48-60 Bulan',
            ],
            [
                'id' => '10',
                'kategori_umur' => '60-72 Bulan',
            ],
      ]);
    }
}