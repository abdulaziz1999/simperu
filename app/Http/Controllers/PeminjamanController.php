<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pembayaran;
use App\Models\WaktuPeminjaman;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataPeminjaman = Peminjaman::join('pembayaran as pe', 'peminjaman.pembayaran_id', '=', 'pe.id')
            ->join('waktu_peminjaman as wp', 'peminjaman.id', '=', 'wp.peminjaman_id')
            ->join('ruangan as ru', 'peminjaman.ruangan_id', '=', 'ru.id')
            ->join('users', 'peminjaman.peminjam_id', '=', 'users.id')
            ->get();
            // dd($dataPeminjaman);
        return view('admin-peminjaman.index',compact('dataPeminjaman'));
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
    public function update(Request $request, $id )
    {
        if($request['status'] == 'diterima'):
            $dataPeminjaman = Peminjaman::where('id', $id)->update([
                'status_peminjaman' => 'Disetujui'
            ]);
            $row = Peminjaman::where('id', $id)->first();
            $dataPembayaran = Pembayaran::where('id', $row->pembayaran_id)->update([
                'status_pembayaran' => 'Lunas'
            ]);
            return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman Diterima');
        elseif($request['status'] == 'ditolak'):
            $dataPeminjaman = Peminjaman::where('id', $id)->update([
                    'status_peminjaman' => 'Ditolak'
            ]);
            $row = Peminjaman::where('id', $id)->first();
            $dataPembayaran = Pembayaran::where('id', $row->pembayaran_id)->update([
                    'status_pembayaran' => 'Belum Lunas'
                ]);
            return redirect()->route('peminjaman.index')->with('error', 'Data Peminjaman Ditolak');
        endif;
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
