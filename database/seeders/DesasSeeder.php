<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('desas')->insert([
            [
                'nama_desa' => 'Desa 1',
                'kode_desa' => 'GTO_Desa2',
                'gelombang_geser' => '2323.3'
            ],

        ]);
    }
}
