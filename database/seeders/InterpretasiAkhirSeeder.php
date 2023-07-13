<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class InterpretasiAkhirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interpretasi_akhirs')->insert([
            [
                'id' => '1',
                'kesimpulan' => 'Normal',
                'keterangan' => 'Jika tidak ada delay/keterlamatan, Paling banyak ada 1 caution (1C), Lakukan ulangan pemeriksaan',
            ],
            [
                'id' => '2',
                'kesimpulan' => 'Suspect',
                'keterangan' => 'Terdapat 2 caution (2C), Dalam hal ini delay terjadi karena gagal bukan karena penolakan',
            
            ],
            [
                'id' => '3',
                'kesimpulan' => 'Untestable/Tidak dapat diuji',
                'keterangan' => 'Terdapat 3 / lebih caution (3C) / lebih, Dalam hal ini delay/caution terjadi karena penolakan bukan karena gagal',
            ],
        ]);
    }
}
