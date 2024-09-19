<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReganganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regangans')->insert([
            [
                'ukuranregangan' => '10^-6',
                'fenomena' => 'Gelombang, Getaran',
                'propertidinamis' => 'Elastisitas'
            ],
            [
                'ukuranregangan' => '10^-5',
                'fenomena' => 'Gelombang, Getaran',
                'propertidinamis' => 'Elastisitas'
            ],
            [
                'ukuranregangan' => '10^-4',
                'fenomena' => 'Gelombang ,getaran,retakan,penurunan',
                'propertidinamis' => 'Elasti-Plasitas'
            ],
            [
                'ukuranregangan' => '10^-3',
                'fenomena' => 'Retak, Penurunan',
                'propertidinamis' => 'Elasti-Plasitas'
            ],
            [
                'ukuranregangan' => '10^-2',
                'fenomena' => 'Retakan, penurunan, longsor, pemadatan tanah, likuevaksi runtuh',
                'propertidinamis' => 'Efek Berulang, Kecepatan Efek Pemuatan/Pembebanan'
            ],
            [
                'ukuranregangan' => '10^-1',
                'fenomena' => 'Longsor, Pemadatan Tanah, Likuefaksi Runtuh',
                'propertidinamis' => 'Efek Berulang, Kecepatan Efek Pemuatan/Pembebanan'
            ],
        ]);
    }
}
