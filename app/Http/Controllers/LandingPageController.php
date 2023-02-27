<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Fasilitas;
use App\Models\FasilitasRuangan;
use App\Models\Gedung;
use App\Models\Ruangan;
use App\Models\KategoriRuangan;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_landing_page()
    {
        //data Group by Fasilitas
        $fasilitasGroup = FasilitasRuangan::select('nama_fasilitas', 'foto')->groupBy('nama_fasilitas', 'foto')->get();
        //data gedung dan data kategori ruangan
        $gedung = Gedung::all();
        //data gedung dan data kategori ruangan
        $kategoriRuangan = Ruangan::join('gedung', 'ruangan.gedung_id', '=', 'gedung.id')
            ->join('kategori_ruangan', 'ruangan.kategori_ruangan_id', '=', 'kategori_ruangan.id')
            ->leftJoin('fasilitas', 'ruangan.id', '=', 'fasilitas.ruangan_id')
            ->limit(6)
            ->get();
        $kategori = KategoriRuangan::all();
        return view('layouts.index', compact('fasilitasGroup', 'gedung', 'kategoriRuangan', 'kategori'))->with('i');
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gedung' => 'required',
            'kategori' => 'required'
        ], [
            'gedung.required' => 'Pilih gedung terlebih dahulu!',
            'kategori.required' => 'Pilih kategori terlebih dahulu!'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->first());
        }

        //query filter data gedung dan data kategori ruangan ke dalam session
        session([
            'gedung_id' => $request->input('gedung'),
            'kategori_id' => $request->input('kategori')
        ]);

        return redirect()->route('list-ruangan.showAllRoom');
    }
}
