<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasitanah extends Model
{
    use HasFactory;

    protected $table = 'klasifikasitanahs';

    protected $fillable = ['jenistanah','kategori','klasifikasikanal','karakteristik'];

    public function pengukurans()
    {
        return $this->hasMany(Pengukuran::class);
    }
}
