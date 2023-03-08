<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluarga')->insert([
            [
                'nik' => '12345',
                'nama' => 'jono',
                'jk' => 'Laki-Laki',
                'tgl_lahir' => '1995-01-01',
                'alamat' => 'Sukun',
            ],
            [
                'nik' => '12346',
                'nama' => 'siti',
                'jk' => 'Perempuan',
                'tgl_lahir' => '1999-02-11',
                'alamat' => 'Sukun',
            ],
            [
                'nik' => '12347',
                'nama' => 'andi',
                'jk' => 'Laki-Laki',
                'tgl_lahir' => '2020-11-23',
                'alamat' => 'Sukun',
            ],
            [
                'nik' => '12348',
                'nama' => 'roni',
                'jk' => 'Laki-Laki',
                'tgl_lahir' => '2023-03-07',
                'alamat' => 'Sukun',
            ]
            ]);
    }
}
