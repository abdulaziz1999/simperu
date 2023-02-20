<?php

namespace App\Exports;

use App\Models\Fasilitas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class FasilitasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Fasilitas::all(['id','nama_fasilitas','foto','keterangan','ruangan_id']);
        $ruangan = DB::table('fasilitas')
        ->join('ruangan', 'ruangan.id', '=', 'fasilitas.ruangan_id')
        ->select('fasilitas.id', 'fasilitas.nama_fasilitas', 'ruangan.nama_ruangan', 'fasilitas.foto', 
        'fasilitas.keterangan')
        ->get();

        return $ruangan;
    }
     // ini untuk judul kolom di excel
     public function headings(): array
    {
         return ['No', 'Nama Fasilitas', 'Nama Ruangan','Foto', 'Keterangan'];
     }
}
