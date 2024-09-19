<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regangan extends Model
{
    use HasFactory;

    protected $table = 'regangans';

    protected $fillable = [
        'ukuranregangan',
        'fenomena',
        'propertidinamis'
    ];

    public function pengukurans()
    {
        return $this->hasMany(Pengukuran::class);
    }
}
