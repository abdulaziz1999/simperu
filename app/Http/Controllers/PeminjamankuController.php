<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PeminjamankuController extends Controller
{
    public function availableCountdown()
    {
        $peminjamanByUser = Peminjaman::where('users_id', '=', Auth::user()->id)
            ->join('ruangan', 'peminjaman.ruangan_id', '=', 'ruangan.id')
            ->join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')
            ->join('pembayaran', 'peminjaman.pembayaran_id', '=', 'pembayaran.id')
            ->orderBy('peminjaman.created_at', 'DESC')
            ->paginate(5);

        $countDown = [];

        foreach ($peminjamanByUser as $key => $value) {
            array_push(
                $countDown,
                [
                    'id' => 'countDown' . $key,
                    'time' => date('Y-m-d H:i:s', strtotime(date_format($value->created_at, 'Y-m-d H:i:s') . '+6 hours'))
                ]
            );
        }

        return $countDown;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjamanByUser = Peminjaman::where('users_id', '=', Auth::user()->id)
            ->join('ruangan', 'peminjaman.ruangan_id', '=', 'ruangan.id')
            ->join('waktu_peminjaman', 'peminjaman.id', '=', 'waktu_peminjaman.peminjaman_id')
            ->join('pembayaran', 'peminjaman.pembayaran_id', '=', 'pembayaran.id')
            ->orderBy('peminjaman.created_at', 'DESC')
            ->paginate(5);

        return view('peminjamanku.index', compact('peminjamanByUser'))->with(['i' => 0, 'btnShowOrNot' => 0, 'modalBsTarget' => 0, 'modalId' => 0, 'modalAriaLabelledBy' => 0, 'modalTitleId' => 0]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // Mengecek jika ada file bukti_pembayaran maka upload ke dalam storage, dan masukan array dokumen ke data pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            // 1. Mengambil nama dari foto
            $bp = $request->file('bukti_pembayaran')->getClientOriginalName();
            // 2. Membuat profil nama untuk foto
            $profileBp = date('dHis') . "." . $bp;
            // 3. Mengupload ke lokal public/storage/post-payment
            $request->file('bukti_pembayaran')->storeAs('post-payment', $profileBp);
            // 4. Mengganti nilai foto dengan nama profilBp
            $pembayaran->bukti_pembayaran = $profileBp;
        }


        $pembayaran->status = 'Lunas';
        $pembayaran->update();

        return redirect()->route('peminjamanku.index')->with('toast_success', 'Berhasil Upload Bukti Pembayaran');
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
}
