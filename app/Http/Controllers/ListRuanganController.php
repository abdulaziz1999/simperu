<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\Gedung;
use App\Models\KategoriRuangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ListRuanganController extends Controller
{
    //FORMATER
    // Function formating ke rupiah
    public function formatRupiah($val)
    {
        return 'Rp. ' . number_format($val, 0, '.', ',');
    }
    // Function formating jam
    public function format_jam($val)
    {
        if ($val < 10) {
            return '0' . $val . ':00:00';
        } else {
            return $val . ':00:00';
        }
    }

    public function selisih_waktu($dateFromReq, $format = false)
    {
        $diff = date_diff(date_create($dateFromReq), date_create(date('Y-m-d h:i:s')));
        if ($format) {
            return $diff->format($format);
        }
        return array(
            'y' => $diff->y,
            'm' => $diff->m,
            'd' => $diff->d,
            'h' => $diff->h,
            'i' => $diff->i,
            's' => $diff->s,
        );
    }

    //METHOD PRIMARY
    public function showAllRoom(Request $request)
    {
        // Kondisi apabila mempunya session gedung_id dan kategori_id
        if ($request->session()->has('gedung_id') && $request->session()->has('kategori_id')) {
            // Nilai dari pencarian
            $gedung_id = $request->session()->get('gedung_id');
            $kategori_id = $request->session()->get('kategori_id');
        } else {
            // Nilai pencarian
            $gedung_id = $request->input('gedung_id');
            $kategori_id = $request->input('kategori_id');
        }

        //query like data gedung dan data kategori ruangan
        $r_OrderByStatusAsc = Ruangan::where('ruangan.gedung_id', $gedung_id)
            ->where('ruangan.kategori_ruangan_id', $kategori_id)
            ->orderBy('ruangan.updated_at', 'desc')
            ->paginate(9);

        //query all data gedung dan data kategori ruangan
        $all_OrderByStatusAsc = Ruangan::orderBy('ruangan.updated_at', 'desc')
            ->paginate(9);

        // Me-assign ulang data ke format rupiah
        foreach ($all_OrderByStatusAsc->items() as $item) {
            $item->harga = $this->formatRupiah($item->harga);
        }
        
        // Me-assign ulang data ke format rupiah
        foreach ($r_OrderByStatusAsc->items() as $item) {
            $item->harga = $this->formatRupiah($item->harga);
        }

        // Hapus Session
        $request->session()->forget('gedung_id');
        $request->session()->forget('kategori_id');

        $data = [
            'nama_gedung' => isset($r_OrderByStatusAsc->items()[0]->gedung->nama_gedung) ? $r_OrderByStatusAsc->items()[0]->gedung->nama_gedung : 'Semua Ruangan',
            'selectedGedung' => isset($gedung_id) ? $gedung_id : '',
            'selectedKategori' => isset($kategori_id) ? $kategori_id : '',
            'gedung' => Gedung::all(['nama_gedung', 'id']),
            'kategori' => KategoriRuangan::all(['nama_kategori', 'id']) 
        ];
        return view('list-ruangan.showAllRoom', compact('r_OrderByStatusAsc','all_OrderByStatusAsc', 'data'));
    }

    public function detailRoomById(Request $request, Ruangan $ruangan)
    {
        //Mengecek session, jika ada maka dihapus
        if ($request->session()->has('peminjaman')) {
            $oldDocs = 'post-docs/' . $request->session()->get('peminjaman.dokumen');
            Storage::delete($oldDocs);
        }

        foreach (['ruangan', 'pembayaran', 'peminjaman', 'waktu_peminjaman', 'harga_ruangan', 'total_harga_ruangan', 'durasi'] as $item) {
            if ($request->session()->has($item)) {
                $request->session()->forget($item);
            }
        }
        // return dd($request->session()->all());

        //Meng-set default gambar ruangan
        foreach ([$ruangan->foto1, $ruangan->foto2, $ruangan->foto3] as $foto) {
            $foto = is_null($foto) ? 'default.png' : $foto;
        }

        //Meng-format mata uang ke rupiah
        $ruangan->harga = $this->formatRupiah($ruangan->harga);

        // Mencari semua ruangan yang ada di gedung tersebut dan yang  masih tersedia
        $all_r = Ruangan::where(
            'gedung_id',
            '=',
            $ruangan->gedung_id
        )->get();

        // Me-assign ulang data ke format rupiah
        foreach ($all_r as $item) {
            $item->harga = $this->formatRupiah($item->harga);
        }

        $booked_rooms = Peminjaman::join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')
            ->join('pembayaran', 'peminjaman.pembayaran_id', '=', 'pembayaran.id')
            ->join('ruangan', 'peminjaman.ruangan_id', '=', 'ruangan.id')
            ->where('ruangan_id', $ruangan->id)
            ->where('status_pembayaran', 'Lunas')
            ->where('waktu_peminjaman.tgl_pinjam', '>=', date('Y-m-d'))
            ->orderBy('waktu_peminjaman.tgl_pinjam', 'ASC')
            ->orderBy('waktu_peminjaman.jam_mulai', 'ASC')
            ->get(['waktu_peminjaman.*', 'pembayaran.status_pembayaran', 'ruangan.nama_ruangan', 'ruangan.lantai']);

        // return dd($booked_rooms);
        return view('list-ruangan.detailRoomById', compact('ruangan', 'all_r', 'booked_rooms'))->with(['i' => 1]);
    }

    public function store(Request $request, Ruangan $ruangan)
    {
        $validator = Validator::make($request->all(), [
            'tgl_pinjam' => 'required',
            'jam_mulai' => 'required',
            'durasi' => 'required',
            'dokumen' => 'required|mimes:pdf|max:10000',
            'keperluan' => 'required',
        ], [
            'tgl_pinjam.required' => 'Tanggal tidak boleh kosong!',
            'jam_mulai.required' => 'Jam tidak boleh kosong!',
            'durasi.required' => 'Durasi tidak boleh kosong!',
            'dokumen.required' => 'Dokumen PDF tidak boleh kosong!',
            'keperluan.required' => 'Keperluan tidak boleh kosong!',
        ]);

        $dateAfterDurasi = date('Y-m-d H:i:s', strtotime($request->tgl_pinjam . '+ ' . substr($request->jam_mulai, 0, 2) . ' hours'));
        $diff = $this->selisih_waktu($dateAfterDurasi);

        if ($diff['d'] < 1) {
            return redirect()->back()->with('toast_error', 'Maaf, waktu pemesanan ruangan harus 1 hari sebelum acara berlangsung!');
        }

        if ($validator->fails()) {
            return redirect()->back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // kumpulin data pembayaran
        $data_pembayaran = [
            'bukti_pembayaran' => '',
            'jumlah_transaksi' => $request->durasi * $ruangan->harga,
            'nomer_telefon' => 0
        ];


        // kumpulin data peminjaman
        $data_peminjaman = [
            'keperluan' => $request->keperluan,
            'users_id' => Auth::user()->id,
            'ruangan_id' => $ruangan->id
            //tambahkan pembayaran_id ketika di post ke database
        ];

        // Mengecek jika ada file dokumen maka upload ke dalam storage, dan masukan array dokumen ke data peminhaman
        if ($request->hasFile('dokumen')) {
            // 1. Mengambil nama dari foto
            $docs = $request->file('dokumen')->getClientOriginalName();
            // 2. Membuat profil nama untuk foto
            $profileDocs = date('dHis') . "." . $docs;
            // 3. Mengupload ke lokal public/storage/post-image
            $request->file('dokumen')->storeAs('post-docs', $profileDocs);
            // 4. Mengganti nilai foto dengan nama profilIMage
            $data_peminjaman['dokumen'] = $profileDocs;
        }

        // kumpulin data waktu_peminjman
        $data_waktu_peminjaman = [
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_selesai' => $request->tgl_pinjam,
            'jam_mulai' => $this->format_jam($request->jam_mulai),
            'jam_selesai' => $this->format_jam($request->jam_mulai + $request->durasi),
            // tambahkan peminjaman_id ketika di post ke database
        ];

        session([
            'ruangan' => $ruangan,
            'pembayaran' => $data_pembayaran,
            'peminjaman' => $data_peminjaman,
            'waktu_peminjaman' => $data_waktu_peminjaman,
            'harga_ruangan' => $this->formatRupiah($ruangan->harga),
            'total_harga_ruangan' => $this->formatRupiah($request->durasi * $ruangan->harga),
            'durasi' => $request->durasi
        ]);

        return redirect()->route('checkout.customerDetail');
    }

    public function availableDate(Ruangan $ruangan, $tgl)
    {
        $jam_masuk = [];
        for ($i = 7; $i <= 17; $i++) {
            array_push($jam_masuk, $i);
        }

        $peminjaman = Peminjaman::join('ruangan', 'peminjaman.ruangan_id', '=', 'ruangan.id')
            ->join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')
            ->where('ruangan_id', $ruangan->id)
            ->where('waktu_peminjaman.tgl_pinjam', $tgl)
            ->get();

        foreach ($peminjaman as $item) {
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
}
