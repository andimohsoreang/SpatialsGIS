<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengukuran extends Model
{
    use HasFactory;

    protected $table = 'pengukurans';

    protected $fillable = [
        'desa_id',
        'lat',
        'long',
        'snis_id',
        'klasifikasitanah_id',
        'jenistanah_id',
        'frekuensi_natural',
        'faktor_aplifikasi_tanah',
        'indeks_kerentanan_sesimik',
        'percepatan_tanah',
        'ukuran_regangan',
        'regangan_geser_tanah',
        'regangan_id',
        'file_gambar', // Kolom file_gambar ditambahkan ke fillable
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }

    public function sni()
    {
        return $this->belongsTo(Sni::class, 'snis_id');
    }

    public function klasifikasitanah()
    {
        return $this->belongsTo(Klasifikasitanah::class, 'klasifikasitanah_id');
    }

    public function jenistanah()
    {
        return $this->belongsTo(Jenistanah::class, 'jenistanah_id');
    }

    public function regangan()
    {
        return $this->belongsTo(Regangan::class, 'regangan_id');
    }
}
