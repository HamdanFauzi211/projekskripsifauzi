<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class InterpretasiHasilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interpretasi_hasils')->insert([
            [
                'id' => '1',
                'kesimpulan' => 'Normal',
                'keterangan' => 'Ananda lolos melakukan 50-100% test yg dilakukan',
                'arti' => 'anak dapat melakukan semua tugas perkembangan sesuai usia  pada tahap tumbuh kembangnya',
            ],
            [
                'id' => '2',
                'kesimpulan' => 'Caution/Peringatan',
                'keterangan' => 'Ananda lolos melakukan <50% test yg dilakukan',
                'arti' => 'anak belum dapat melakukan semua tugas perkembangan pada usianya. Pada kategori caution anak tidak dapat melakukan tugas dapat dimungkinkan karena anak mengantuk atau leleah saat menjalani tes tahap tumbuh kembang',
            ],
        ]);
    }
}
