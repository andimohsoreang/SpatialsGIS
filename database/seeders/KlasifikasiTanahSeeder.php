<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasifikasiTanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('klasifikasitanahs')->insert([
            [
                'jenistanah' => 'Jenis I',
                'kategori' => 'Keras',
                'klasifikasikanal' => '0,05-0,15',
                'karakteristik' => 'Batuan tersier atau lebih tua. Terdiri atas batuan pasir berkerikil keras (hard sandy gravel).',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenistanah' => 'Jenis II',
                'kategori' => 'Sedang',
                'klasifikasikanal' => '0,15-0,25',
                'karakteristik' => 'Batuan alluvial dengan ketebalan 5 m. Terdiri atas sandy gravel, sandy hard clay, lempung (loam), tanah liat, dll.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenistanah' => 'Jenis III',
                'kategori' => 'Lunak',
                'klasifikasikanal' => '0,25-0,40',
                'karakteristik' => 'Batuan alluvial hampir sama dengan jenis II hanya dibedakan oleh adanya formasi bluff.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenistanah' => 'Jenis IV',
                'kategori' => 'Sangat Lunak',
                'klasifikasikanal' => '> 0,40',
                'karakteristik' => 'Batuan alluvial yang terbentuk atas sedimentasi delta, top soil, lumpur, tanah lunak, humus, endapan lumpur yang tergolong tanah lembek, dll. Kedalaman 30 m atau lebih.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
