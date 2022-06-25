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

        $dt_not_avail = Ruangan::join('peminjaman', 'ruangan.id', '=', 'peminjaman.ruangan_id')->join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')->get(['waktu_peminjaman.*']);
        $dt_desc = Ruangan::join('peminjaman', 'ruangan.id', '=', 'peminjaman.ruangan_id')->join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')->orderBy('tgl_selesai', 'desc')->first(['waktu_peminjaman.*']);
        $dt_desc = isset($dt_desc) ? $dt_desc : date("Y-m-d");
        // dd($dt_desc);
        $jam = [];
        // List jam
        for ($i = 6; $i <= 22; $i++) {
            array_push($jam, $i);
        }

        foreach ($dt_not_avail as $item) {
            array_splice($jam, (int)$item->jam_mulai - 6, count(range((int)$item->jam_mulai, (int)$item->jam_selesai)));
        }

        return view('list-ruangan.view_detail_ruangan', compact('ruangan', 'jam', 'all_r', 'dt_desc'))->with(['i' => 1]);
    }

    public function checkout(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'keperluan' => '',
            'dokumen' => '',
            'status' => '',
            'peminjaman_id' => '',
            'ruangan_id' => '',
            'pembayaran_id' => ''
        ]);

        $peminjaman = [
            $request->keperluan,
            $request->status = 'Diajukan',
            $request->dokumen,
            $request->ruangan_id = $ruangan->id
        ];
        $waktu_peminjaman = [
            $request->tanggal_masuk,
            $request->waktu_masuk,
            $request->tanggal_keluar,
            $request->waktu_keluar
        ];
    }
}
