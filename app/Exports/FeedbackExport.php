<?php

namespace App\Exports;

use App\Models\Feedback;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FeedbackExport implements FromCollection,  WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Feedback::all(['id','keterangan']);
    }
     // ini untuk judul kolom di excel
     public function headings(): array
    {
        return ['No', 'Keterangan'];
     }
}
