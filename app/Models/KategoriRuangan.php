<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriRuangan extends Model
{
    use HasFactory;
    protected $table = 'kategori_ruangan';
    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];

    // Relasi ane to many
    // 1 kategoriRuangan memiliki banyak ruangan

    public function ruangan()
    {
        return $this->hasMany(Ruangan::class);
    }
}
