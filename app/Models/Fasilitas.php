<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';

    protected $fillable = [
        'nama_fasilitas',
        'keterangan',
        'ruangan_id',
    ];
}
