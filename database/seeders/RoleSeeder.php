<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => '1',
                'nama_role' => 'Admin'
            ],
            [   
                'id' => '2',
                'nama_role' => 'Guru'
            ],
            [
                'id' => '3',
                'nama_role' => 'Pakar'
            ],
            [
                'id' => '4',
                'nama_role' => 'Orang Tua'
            ]
        ]);
    }
}
