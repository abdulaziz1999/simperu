<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $table = 'ruangan';

    protected $guarded = [
        'id'
    ];

    // 1 ruangan merujuk/merefer ke sebuah gedung 
    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }

    public function kategoriRuangan()
    {
        return $this->belongsTo(KategoriRuangan::class);
    }
}
