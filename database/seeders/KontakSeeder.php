<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kontak')->insert([
            'id' => 1,
            'email' => 'informasi.arusku@gmail.com',
            'alamat' => 'Jalan Profesor Dokter H. Hadari Nawawi, Bansir Laut, Kec. Pontianak Tenggara, Kota Pontianak, Kalimantan Barat 78115',
            'kota' => 'Kota Pontianak',
        ]);
    }
}
