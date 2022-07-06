<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\WaktuPeminjaman;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        date_default_timezone_set('Asia/Jakarta');
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

        // Menampilkan jam_mulai dengan group sesuai dengan tanggalnyaruangannya.
        $booked_rooms = Peminjaman::join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')
            ->join('ruangan', 'peminjaman.ruangan_id', '=', 'ruangan.id')
            ->orderBy('waktu_peminjaman.tgl_pinjam', 'ASC')
            ->orderBy('waktu_peminjaman.jam_mulai', 'ASC')
            ->where('ruangan_id', $ruangan->id)
            ->where('waktu_peminjaman.tgl_pinjam', '>=', date('Y-m-d'))
            ->get(['waktu_peminjaman.*', 'peminjaman.status', 'ruangan.nama_ruangan', 'ruangan.lantai']);

        return view('list-ruangan.view_detail_ruangan', compact('ruangan', 'all_r', 'booked_rooms'))->with(['i' => 1]);
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
        $test_query = Peminjaman::join('ruangan', 'peminjaman.ruangan_id', '=', 'ruangan.id')
            ->join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')
            ->where('ruangan_id', $ruangan->id)
            ->where('waktu_peminjaman.tgl_pinjam', $tgl)
            ->get();

        // return ($test_query == $tgl);
        foreach ($test_query as $item) {
            array_splice($jam_masuk, array_search((int)$item->jam_mulai, $jam_masuk), count(range((int)$item->jam_mulai, (int)$item->jam_selesai)) - 1);
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
                if ($iterasi > 0) {
                    array_push($new_array, ['jam' => $test['jam'], 'durasi' => $iterasi]);
                }
                $iterasi--;
            }
        }

        echo json_encode($new_array);
    }

    public function checkout_detail(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'tgl_pinjam' => 'required',
            'jam_mulai' => 'required',
            'durasi' => 'required',
            'dokumen' => 'required',
            'keperluan' => 'required',
        ]);

        // kumpulin data pembayaran
        $data_pembayaran = new Pembayaran;
        $data_pembayaran->bukti_pembayaran =  '';
        $data_pembayaran->jumlah_transaksi =  $request->durasi * $ruangan->harga;
        $data_pembayaran->nomer_telefon =  0;

        $data_pembayaran->save();

        // kumpulin data peminjaman
        $data_peminjaman = new Peminjaman;
        $data_peminjaman->dokumen =  $request->dokumen;
        $data_peminjaman->keperluan =  $request->keperluan;
        $data_peminjaman->users_id =  Auth::user()->id;
        $data_peminjaman->ruangan_id =  $ruangan->id;
        $data_peminjaman->pembayaran_id =  $data_pembayaran->id;
        $data_peminjaman->save();

        // kumpulin data waktu_peminjman
        $data_waktu_peminjaman = new WaktuPeminjaman;
        $data_waktu_peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $data_waktu_peminjaman->tgl_selesai = $request->tgl_pinjam;
        $data_waktu_peminjaman->jam_mulai = $this->format_jam($request->jam_mulai);
        $data_waktu_peminjaman->jam_selesai = $this->format_jam($request->jam_mulai + $request->durasi);
        $data_waktu_peminjaman->peminjaman_id = $data_peminjaman->id;
        $data_waktu_peminjaman->save();

        // kumpulin data peminjam dengan id dari data peminjam
        $peminjaman = Peminjaman::find($data_peminjaman->id);

        return view('checkout.checkout_detail', [
            'ruangan' => $ruangan,
            'pembayaran' => $data_pembayaran,
            'peminjaman' => $peminjaman,
            'dwp' => $data_waktu_peminjaman,
            'dwp_plus' => [
                'harga_ruangan' => $this->formatRupiah($ruangan->harga),
                'durasi' => $request->durasi,
                'total_harga_ruangan' => $this->formatRupiah($request->durasi * $ruangan->harga)
            ],
        ]);
    }

    public function notif_pay(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'nomer_telefon' => 'required',
        ]);

        $pembayaran->nomer_telefon = $request->nomer_telefon;
        $pembayaran->update();

        return redirect()->url('');
    }

    public function bill_and_payment()
    {
        // expired transfer
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d H:i:s');
        $date1 = str_replace('-', '/', $date_now);
        $date_tomorrow = date('Y-m-d H:i:s', strtotime($date1 . "+1 days"));

        return view('checkout.bill_and_payment', compact('date_now', 'date_tomorrow'));
    }
}
