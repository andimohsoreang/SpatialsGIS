<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SnisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('snis')->insert([
            [
                'snis' => '> 1500',
                'kategori' => 'SA (Batuan Keras)'
            ],
            [
                'snis' => '> 750-1500',
                'kategori' => 'SB (Batuan)'
            ],
            [
                'snis' => '> 350-750',
                'kategori' => 'SC  (Tanah Keras, Sangat Padat dan Batuan Lunak)'
            ],
            [
                'snis' => '> 175-350',
                'kategori' => 'SD ( Tanah Sedang )'
            ],
            [
                'snis' => '<175',
                'kategori' => 'SE ( Tanah Lunak )'
            ],
        ]);
    }
}
