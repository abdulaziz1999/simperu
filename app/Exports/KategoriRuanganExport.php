<?php

namespace App\Exports;

use App\Models\KategoriRuangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KategoriRuanganExport implements FromCollection,  WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KategoriRuangan::all(['id','nama_kategori','keterangan']);
    }
     // ini untuk judul kolom di excel
     public function headings(): array
    {
        return ['No', 'Nama', 'Keterangan'];
     }
}
