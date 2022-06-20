<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mansion extends Model
{
    use HasFactory;

    protected $table = 'ruangan';
    protected $guarded = ['id'];

    // // 1 ruangan memiliki banyak fasilitas
    // public function fasilitas()
    // {
    //     return $this->hasMany(Fasilitas::class);
    // }

    // // Banyak ruangan dimemiliki 1 gedung
    // public function gedung()
    // {
    //     return $this->belongsTo(Gedung::class);
    // }

    // // Banyak ruangan dimemiliki 1 kategori
    // public function kategoriRuangan()
    // {
    //     return $this->belongsTo(KategoriRuangan::class);
    // }
}
