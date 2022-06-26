<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';
    protected $guarded = ['id'];

    // 1 ruangan memiliki banyak fasilitas
    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class);
    }

    // Banyak ruangan dimemiliki 1 gedung
    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }

    // Banyak ruangan dimemiliki 1 kategori
    public function kategoriRuangan()
    {
        return $this->belongsTo(KategoriRuangan::class);
    }

    // 1 Ruangan dimiliki 1 Peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function test($tgl_pinjam)
    {
        $banyak_jam = 0;
        $jam_masuk = [];

        // List jam
        for ($i = 7; $i <= 17; $i++) {
            array_push($jam_masuk, $i);
        }

        $test_query = Ruangan::join('peminjaman', 'ruangan.id', '=', 'peminjaman.ruangan_id')->join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')->where('tgl_pinjam', $tgl_pinjam)->get(['waktu_peminjaman.*']);

        foreach ($test_query as $item) {
            $banyak_jam += count(range((int)$item->jam_mulai, (int)$item->jam_selesai)) - 1;
        }

        foreach ($test_query as $item) {
            array_splice($jam_masuk, (int)$item->jam_mulai - 7, $banyak_jam);
        }

        return $jam_masuk;
    }
}
