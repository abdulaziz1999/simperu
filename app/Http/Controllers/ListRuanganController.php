<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\WaktuPeminjaman;
use App\Models\Pembayaran;
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

        // Menampilkan jam_mulai dengan group sesuai dengan tanggalnyaruangannya.
        $booked_rooms = Peminjaman::where('ruangan_id', $ruangan->id)->join('ruangan', 'peminjaman.ruangan_id', '=', 'ruangan.id')->join('waktu_peminjaman', 'waktu_peminjaman.peminjaman_id', '=', 'peminjaman.id')->orderBy('waktu_peminjaman.tgl_pinjam')->get(['peminjaman.status', 'waktu_peminjaman.*']);

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

        $test_query = Peminjaman::where('ruangan_id', $ruangan->id)->join('ruangan', 'peminjaman.ruangan_id', '=', 'ruangan.id')->join('waktu_peminjaman', 'waktu_peminjaman.peminjaman_id', '=', 'peminjaman.id')->where('tgl_pinjam', $tgl)->get(['waktu_peminjaman.*']);

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
        // dd($test_query);
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

    public function checkoutDetail(Request $request, Ruangan $ruangan)
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
        // $data_pembayaran->save();

        // kumpulin data peminjaman
        $data_peminjaman = new Peminjaman;
        $data_peminjaman->dokumen =  $request->dokumen;
        $data_peminjaman->keperluan =  $request->keperluan;
        // 'peminjam_id' => Session::get('id'),
        $data_peminjaman->peminjam_id =  1;
        $data_peminjaman->ruangan_id =  $ruangan->id;
        $data_peminjaman->pembayaran_id =  $data_pembayaran->id;

        // kumpulin data waktu_peminjman
        $data_waktu_peminjaman = new WaktuPeminjaman;
        $data_waktu_peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $data_waktu_peminjaman->tgl_selesai = $request->tgl_pinjam;
        $data_waktu_peminjaman->jam_mulai = $this->format_jam($request->jam_mulai);
        $data_waktu_peminjaman->jam_selesai = $this->format_jam($request->jam_mulai + $request->durasi);
        $data_waktu_peminjaman->peminjam_id = $data_peminjaman->id;

        // kumpulin data peminjam dengan id dari data peminjam
        $peminjaman = Peminjaman::find($data_peminjaman->id);


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-sm9Bf0VgzrUPlJ5krKguwfLA';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('checkout.checkout_detail', [
            'ruangan' => $ruangan,
            'peminjaman' => $peminjaman,
            'dwp' => $data_waktu_peminjaman,
            'dwp_plus' => [
                'harga_ruangan' => $this->formatRupiah($ruangan->harga),
                'durasi' => $request->durasi,
                'total_harga_ruangan' => $this->formatRupiah($request->durasi * $ruangan->harga)
            ],
            'snap_token' => $snapToken
        ]);
    }
}
