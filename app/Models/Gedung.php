<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;
    protected $table = 'gedung';

    protected $fillable = [
        'kode',
        'nama_gedung',
        'foto',
        'alamat',
        'link_gmaps',
        'link_iframe_gmaps',
    ];

    // Relasi ane to many
    // 1 gedung memiliki banyak ruangan
    public function ruangan()
    {
        return $this->hasMany(Ruangan::class);
    }
}
