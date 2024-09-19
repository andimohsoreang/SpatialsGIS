<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisTanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenistanahs')->insert([
            [
                'jenistanah' => 'I',
                'klasifikasi' => 'Rendah',
                'klasifikasikanal' => 'A0 < 3'
            ],
            [
                'jenistanah' => 'II',
                'klasifikasi' => 'Sedang',
                'klasifikasikanal' => '3 < A0 < 3'

            ],
            [
                'jenistanah' => 'III',
                'klasifikasi' => 'Tinggi',
                'klasifikasikanal' => '6 < A0 < 9',
            ],
            [
                'jenistanah' => 'IV',
                'klasifikasi' => 'Sangat Tinggi',
                'klasifikasikanal' => 'A0 > 9'
            ],

        ]);
    }
}
