<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert( [
            [
                'nama' => 'Tri Risma Harini',
                'no_hp' => '081717456900',
                'username' => 'admin1',
                'password' => Hash::make('admin123'),
                'role' => 'Admin',
            ],
            [
                'nama' => 'Sri Mulyani',
                'no_hp' => '081717456901',
                'username' => 'guru1',
                'password' => Hash::make('guru123'),
                'role' => 'Guru',
            ],
            [
                'nama' => 'Hamdan Fauzi',
                'no_hp' => '081717456902',
                'username' => 'orangtua1',
                'password' => Hash::make('orangtua123'),
                'role' => 'OrangTua',
            ],

            [
                'nama' => 'Pratama',
                'no_hp' => '081717456234',
                'username' => 'pakar1',
                'password' => Hash::make('pakar123'),
                'role' => 'Pakar',
            ],
        ]);
    }
}
