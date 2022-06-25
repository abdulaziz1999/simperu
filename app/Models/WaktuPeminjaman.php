<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'waktu_peminjaman';
    protected $guarded = ['id'];

    // banyak waktu peminjaman 1 peminjaman
    public function peminjam()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}
