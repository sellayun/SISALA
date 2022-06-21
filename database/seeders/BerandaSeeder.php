<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BerandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beranda')->insert([
            'id' => 1,
            'foto' => '1_3yU_Zbhj9zDZwboFLHS1rg.png',
            'judul' => 'Apa itu Arusku?',
            'deskripsi' => 'Arusku adalah aplikasi yang dikembangkan untuk membantu melakukan kajian dibidang kelautan. Aplikasi ini digunakan oleh Mahasiswa untuk melakukan simulasi perhitungan melalui layanan ini dan diharapkan dapat membantu mahasiswa dalam melakukan pengelolaan data perhitungan.',
        ]);
    }
}
