<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kendaraan')->insert([
            [
                'nopol' => 'N 1 PL',
                'merk' => 'Mercedes',
                'jenis' => 'C-Class',
                'tahun_buat' => '2021',
                'warna' => 'Hitam'
            ],
            [
                'nopol' => 'N 2 PL',
                'merk' => 'Toyota',
                'jenis' => 'Alphard',
                'tahun_buat' => '2021',
                'warna' => 'Hitam'
            ]
            ]);
    }
}
