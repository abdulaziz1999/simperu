<?php

namespace App\Exports;

use App\Models\Ruangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class RuanganExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Ruangan::all();
        $ruangan = DB::table('ruangan')
        ->join('gedung', 'gedung.id', '=', 'ruangan.gedung_id')
        ->join('kategori_ruangan', 'kategori_ruangan.id', '=', 'ruangan.kategori_ruangan_id')
        ->select('ruangan.nama_ruangan', 'kategori_ruangan.nama_kategori', 'gedung.nama_gedung',
                 'ruangan.kapasitas', 'ruangan.status', 'ruangan.harga')
        ->get();

        return $ruangan;

    }
    // ini untuk judul kolom di excel
    public function headings(): array
    {
        return["Nama Ruangan", "Kategori Ruangan", "Gedung", "Kapasitas", "Status", "Harga"];
    }
}
