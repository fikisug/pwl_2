<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodi = [
            ['nama_prodi'=>'D4-TI'],
            ['nama_prodi'=>'D4-SIB']
        ];

        DB::table('prodi')->insert($prodi);
    }
}
