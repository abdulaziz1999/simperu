<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\WaktuPeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListRuanganController extends Controller
{
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

        // Menampilkan tanggal dan waktu peminjaman yang paling akhir
        $dt_not_avail = Ruangan::join('peminjaman', 'ruangan.id', '=', 'peminjaman.ruangan_id')->join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')->get(['waktu_peminjaman.*']);

        // Menampilkan jam_mulai paling awal
        $jam_mulai_paling_awal = Ruangan::join('peminjaman', 'ruangan.id', '=', 'peminjaman.ruangan_id')->join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')->orderBy('jam_mulai')->first(['waktu_peminjaman.jam_mulai']);

        // Menampilkan jam_mulai dengan group sesuai dengan tanggalnya
        $test_query = Ruangan::join('peminjaman', 'ruangan.id', '=', 'peminjaman.ruangan_id')->join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')->where('tgl_pinjam', '2022-06-25')->get(['waktu_peminjaman.*']);

        return view('list-ruangan.view_detail_ruangan', compact('ruangan', 'all_r'))->with(['i' => 1]);
    }

    // Function formating ke rupiah
    public function formatRupiah($val)
    {
        return 'Rp. ' . number_format($val, 0, '.', ',');
    }

    public function format_jam($val)
    {
        if ($val < 10) {
            return '0' . $val . ':00:00';
        } else {
            return $val . ':00:00';
        }
    }

    public function available_date(Ruangan $ruangan, $tgl)
    {
        $jam_masuk = [];

        // List jam
        for ($i = 7; $i <= 17; $i++) {
            array_push($jam_masuk, $i);
        }
        $test_query = Peminjaman::where('ruangan_id', $ruangan->id)->join('ruangan', 'peminjaman.ruangan_id', '=', 'ruangan.id')->join('waktu_peminjaman', 'waktu_peminjaman.peminjaman_id', '=', 'peminjaman.id')->where('tgl_pinjam', $tgl)->get(['waktu_peminjaman.*']);

        foreach ($test_query as $item) {
            array_splice($jam_masuk, (int)$item->jam_mulai - 7, count(range((int)$item->jam_mulai, (int)$item->jam_selesai)) - 1);
        }

        $previous = null;
        $result = array();
        $consecutiveArray = array();

        // Slice array by consecutive sequences
        foreach ($jam_masuk as $number) {
            if ($number == $previous + 1) {
                $consecutiveArray[] = ['jam' => $number];
            } else {
                if (empty($consecutiveArray)) {
                } else {
                    $result[] = $consecutiveArray;
                }
                $consecutiveArray = array(['jam' => $number]);
            }
            $previous = $number;
        }
        $result[] = $consecutiveArray;

        $new_array = array();
        foreach ($result as $key => $value) {
            $iterasi = count($value) - 1;
            foreach ($value as $test) {
                array_push($new_array, ['jam' => $test['jam'], 'durasi' => $iterasi]);
                $iterasi--;
            }
        }

        echo json_encode($new_array);
    }

    public function checkout(Request $reqeust)
    {
        $reqeust->validate([
            'tgl_pinjam' => 'required',
            'jam_mulai' => 'required',
            'durasi' => 'required',
            'dokumen' => 'required',
            'keperluan' => 'required',
        ]);


        $data = [
            'tgl_pinjam' => $reqeust->tgl_pinjam,
            'tgl_selesai' => $reqeust->tgl_pinjam,
            'jam_mulai' => $this->format_jam($reqeust->jam_mulai),
            'jam_selesai' => $this->format_jam($reqeust->jam_mulai + $reqeust->durasi)
        ];

        $test = Peminjaman::join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')->get([]);


        dd($test->ruangan);

        // $peminjaman = [
        //     $request->keperluan,
        //     $request->status = 'Diajukan',
        //     $request->dokumen,
        //     $request->ruangan_id = $ruangan->id
        // ];
        // $waktu_peminjaman = [
        //     $request->tanggal_masuk,
        //     $request->waktu_masuk,
        //     $request->tanggal_keluar,
        //     $request->waktu_keluar
        // ];
    }
}
