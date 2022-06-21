<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert(
            [
            'id' => 1,
            'foto' => '149071.jpg',
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'nim' => 'H110116102042342',
            'phone' => '082131222234222',
            'password' => '12345',
            'level' => 'Admin',
            'status' => 1,
            'verif' => 1,
            'tanggal' => '2022-03-27 00:00:00',
            ],
            [
                'id' => 2,
                'foto' => '149071.jpg',
                'nama' => 'Mahasiswa',
                'email' => 'mhs@gmail.com',
                'nim' => 'H110116102042',
                'phone' => '082131222222',
                'password' => '12345',
                'level' => 'Mahasiswa',
                'status' => 1,
                'verif' => 1,
                'tanggal' => '2022-03-27 00:00:00',
            ]
        );
    }
}
