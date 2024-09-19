<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sni extends Model
{
    use HasFactory;

    protected $fillable = [
        'snis',
        'kategori'
    ];

    public function pengukurans()
    {
        return $this->hasMany(Pengukuran::class);
    }

}
