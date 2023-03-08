<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matakuliah')->insert([
            [
                'kode' => 'RT1214008',
                'nama' => 'Pemrograman Web Lanjut',
                'sks' => '4',
                'jam' => '6'

            ],
            [
                'kode' => 'RT1214001',
                'nama' => 'Kewarganegaraan',
                'sks' => '2',
                'jam' => '2'
            ],
            [
                'kode' => 'RT1214002',
                'nama' => 'ADBO',
                'sks' => '2',
                'jam' => '4'
            ],
            [
                'kode' => 'RT1214003',
                'nama' => 'Manajemen Proyek',
                'sks' => '2',
                'jam' => '4'
            ],
            [
                'kode' => 'RT1214004',
                'nama' => 'Proyek 1',
                'sks' => '3',
                'jam' => '6'
            ],
            [
                'kode' => 'RT1214006',
                'nama' => 'Business Inteligence',
                'sks' => '2',
                'jam' => '4'
            ],
            [
                'kode' => 'RT1214007',
                'nama' => 'Praktikum Jaringan Komputer',
                'sks' => '2',
                'jam' => '4'
            ],
            [
                'kode' => 'RT1214009',
                'nama' => 'Statistik Komputasi',
                'sks' => '2',
                'jam' => '4'
            ]
            ]);
    }
}
