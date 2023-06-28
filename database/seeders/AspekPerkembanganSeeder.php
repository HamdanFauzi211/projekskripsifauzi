<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AspekPerkembanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aspek_perkembangans')->insert([
            [
                'id' => '1',
                'nama_aspek' => 'Motorik Kasar',
            ],
            [
                'id' => '2',
                'nama_aspek' => 'Motorik Halus',
            ],
            [
                'id' => '3',
                'nama_aspek' => 'Bicara dan Bahasa',
            ],
            [
                'id' => '4',
                'nama_aspek' => 'Sosial dan Kemandirian',
            ],
        ]);
    }
}