<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $guarded = ['id'];

    // banyak fasilitas dimemiliki satu ruangan
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    // 1 Peminjaman memiliki banyak waktu peminjaman
    public function waktuPeminjaman()
    {
        return $this->hasMany(waktuPeminjaman::class);
    }

    // Banyak Peminjaman dimiliki 1 pembayaran 
    public function pembayaran()
    {
        return $this->belongsTo(waktuPeminjaman::class);
    }
}
