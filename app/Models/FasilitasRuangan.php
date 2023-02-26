<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasRuangan extends Model
{
    use HasFactory;
    protected $table = 'fasilitas_ruangan';

    protected $guarded = ['id'];

    // Relasi many to one
    // banyak fasilitas dimemiliki satu ruangan
    // public function ruangan()
    // {
    //     return $this->belongsTo(Ruangan::class);
    // }
}
