<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenistanah extends Model
{
    use HasFactory;

    protected $table = 'jenistanahs';

    protected $fillable = [
        'jenistanah',
        'klasifikasi',
        'klasifikasikanal'
    ];

    public function pengukurans()
    {
        return $this->hasMany(Pengukuran::class);
    }


}
