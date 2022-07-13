<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\WaktuPeminjaman;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class List_ruangan_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Nilai default adalah asc
        $r_OrderByStatusAsc = DB::table('ruangan')
            ->orderBy('status', 'asc')
            ->latest()
            ->paginate(9);
        // Me-assign ulang data ke format rupiah
        foreach ($r_OrderByStatusAsc->items() as $item) {
            $item->harga = $this->formatRupiah($item->harga);
        }

        return view('list-ruangan.index', compact('r_OrderByStatusAsc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            'tgl_pinjam' => 'required',
            'jam_mulai' => 'required',
            'durasi' => 'required',
            'dokumen' => 'required|mimes:pdf|max:10000',
            'keperluan' => 'required',
        ]);


        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $ruangan = Ruangan::find($request->r_idx);
        // kumpulin data pembayaran
        $data_pembayaran = new Pembayaran;


        $data_pembayaran->bukti_pembayaran =  '';
        $data_pembayaran->jumlah_transaksi =  $request->durasi * $ruangan->harga;
        $data_pembayaran->nomer_telefon =  0;
        $data_pembayaran->save();

        // kumpulin data peminjaman
        $data_peminjaman = new Peminjaman;
        if ($request->hasFile('dokumen')) {
            // 1. Mengambil nama dari foto
            $docs = $request->file('dokumen')->getClientOriginalName();
            // 2. Membuat profil nama untuk foto
            $profileDocs = date('dHis') . "." . $docs;
            // 3. Mengupload ke lokal public/storage/post-image
            $request->file('dokumen')->storeAs('post-docs', $profileDocs);
            // 4. Mengganti nilai foto dengan nama profilIMage
            $data_peminjaman->dokumen = $profileDocs;
            // 5. Menyimpan kembali
        }

        // $data_peminjaman->dokumen =  $request->dokumen;
        $data_peminjaman->keperluan =  $request->keperluan;
        $data_peminjaman->users_id =  Auth::user()->id;
        $data_peminjaman->ruangan_id =  $ruangan->id;
        $data_peminjaman->pembayaran_id =  $data_pembayaran->id;
        session(['peminjaman' => $data_peminjaman]);

        // return dd($request->session()->all());

        // $data_peminjaman->save();

        // kumpulin data waktu_peminjman
        $data_waktu_peminjaman = new WaktuPeminjaman;
        $data_waktu_peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $data_waktu_peminjaman->tgl_selesai = $request->tgl_pinjam;
        $data_waktu_peminjaman->jam_mulai = $this->format_jam($request->jam_mulai);
        $data_waktu_peminjaman->jam_selesai = $this->format_jam($request->jam_mulai + $request->durasi);
        // $data_waktu_peminjaman->peminjaman_id = $data_peminjaman->id;
        // $data_waktu_peminjaman->save();

        session([
            'ruangan' => $ruangan,
            'pembayaran' => $data_pembayaran,
            'waktu_peminjaman' => $data_waktu_peminjaman,
            'harga_ruangan' => $this->formatRupiah($ruangan->harga),
            'total_harga_ruangan' => $this->formatRupiah($request->durasi * $ruangan->harga),
            'durasi' => $request->durasi
        ]);
        // return dd($request);

        // kumpulin data peminjam dengan id dari data peminjam
        $peminjaman = Peminjaman::find($data_peminjaman->id);

        // return dd($request->session()->all());
        return redirect()->route('list-ruangan.edit', $request->r_idx);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $request->session()->forget(['ruangan', 'pembayaran', 'peminjaman', 'waktu_peminjaman']);
        $ruangan = Ruangan::find($id);

        $ruangan->foto1 = $ruangan->foto1 == null ? 'default.png' : $ruangan->foto1;
        $ruangan->foto2 = $ruangan->foto2 == null ? 'default.png' : $ruangan->foto2;
        $ruangan->foto3 = $ruangan->foto3 == null ? 'default.png' : $ruangan->foto3;
        $ruangan->harga = $this->formatRupiah($ruangan->harga);
        // return dd($ruangan);

        // Mencari semua ruangan yang ada di gedung tersebut dan yang  masih tersedia
        $all_r = Ruangan::where(
            'gedung_id',
            '=',
            $ruangan->gedung_id
            // ['status', '=', 'Tersedia'] (dihilangkan karena tidak terpakai)
        )->get();

        // Me-assign ulang data ke format rupiah
        foreach ($all_r as $item) {
            $item->harga = $this->formatRupiah($item->harga);
        }

        $booked_rooms = Peminjaman::join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')
            ->join('ruangan', 'peminjaman.ruangan_id', '=', 'ruangan.id')
            ->orderBy('waktu_peminjaman.tgl_pinjam', 'ASC')
            ->orderBy('waktu_peminjaman.jam_mulai', 'ASC')
            ->where('ruangan_id', $id)
            ->where('waktu_peminjaman.tgl_pinjam', '>=', date('Y-m-d'))
            ->get(['waktu_peminjaman.*', 'peminjaman.status', 'ruangan.nama_ruangan', 'ruangan.lantai']);

        return view('list-ruangan.show', compact('ruangan', 'all_r', 'booked_rooms'))->with(['i' => 1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // return dd($request->session()->get('durasi'));
        return view('list-ruangan.checkout_detail', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pembayaran = Pembayaran::find($request->session()->get('peminjaman')->pembayaran_id);
        $pembayaran->nomer_telefon = $request->nomer_tel;
        $pembayaran->update();

        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
