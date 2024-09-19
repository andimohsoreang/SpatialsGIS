<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_desa',
        'kode_desa',
        'gelombang_geser'
    ];

    public function pengukurans()
    {
        return $this->hasMany(Pengukuran::class);
    }


}
