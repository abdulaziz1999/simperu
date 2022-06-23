<?php

namespace App\Http\Controllers;


use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListRuanganController extends Controller
{
    // Function formating ke rupiah
    public function formatRupiah($val)
    {
        return 'Rp. ' . number_format($val, 0, '.', ',');
    }

    public function list_ruangan()
    {
        // Nilai default orderBy adalah asc
        $r_OrderByStatusAsc = DB::table('ruangan')->orderBy('status', 'asc')->latest()->paginate(9);
        // Me-Assign ulang data ke format rupiah
        foreach ($r_OrderByStatusAsc->items() as $item) {
            $item->harga = $this->formatRupiah($item->harga);
        }
        return view('list-ruangan.view_list_ruangan', compact('r_OrderByStatusAsc'));
    }

    public function detail_ruangan(Ruangan $ruangan)
    {
        $ruangan->foto1 = $ruangan->foto1 == null ? 'default.png' : $ruangan->foto1;
        $ruangan->foto2 = $ruangan->foto2 == null ? 'default.png' : $ruangan->foto2;
        $ruangan->foto3 = $ruangan->foto3 == null ? 'default.png' : $ruangan->foto3;
        $d_now = date("Y-m-d");
        $ruangan->harga = $this->formatRupiah($ruangan->harga);

        // Mencari semua ruangan yang ada di gedung tersebut dan yang  masih tersedia
        $all_r = DB::table('ruangan')->where([
            ['gedung_id', '=', $ruangan->gedung_id],
            ['status', '=', 'Tersedia']
        ])->get();
        // Me-Assign ulang data ke format rupiah
        foreach ($all_r as $item) {
            $item->harga = $this->formatRupiah($item->harga);
        }

        return view('list-ruangan.view_detail_ruangan', compact('ruangan', 'd_now', 'all_r'))->with(['i' => 1]);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            '' => '',
            '' => ''
        ]);
    }
}
