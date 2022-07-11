<?php

namespace App\Exports;

use App\Models\Gedung;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GedungExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gedung::all(['id','kode','nama_gedung','alamat','foto']);
    }
     // ini untuk judul kolom di excel
     public function headings(): array
    {
         return ['No', 'Kode', 'Nama', 'Alamat','Foto'];
     }
}
