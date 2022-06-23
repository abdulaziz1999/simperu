<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fasilitas;
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
        $fasilitasGroup = Fasilitas::select('nama_fasilitas', 'keterangan')->groupBy('nama_fasilitas', 'keterangan')->get();
        //data gedung dan data kategori ruangan
        $gedung = Gedung::all();
        //data gedung dan data kategori ruangan
        $kategoriRuangan = Ruangan::join('gedung', 'ruangan.gedung_id', '=', 'gedung.id')
                            ->join('kategori_ruangan', 'ruangan.kategori_ruangan_id', '=', 'kategori_ruangan.id')
                            ->leftJoin('fasilitas', 'ruangan.id', '=', 'fasilitas.ruangan_id')
                            ->limit(6)
                            ->get();
        $kategori = KategoriRuangan::all();
        // dd([$gedung, $kategoriRuangan]);
        return view('layouts.index', compact('fasilitasGroup', 'gedung', 'kategoriRuangan','kategori'))->with('i');
    }

    public function search(Request $request)
    {
        //query filter data gedung dan data kategori ruangan
        $gedung = $request->input('gedung');
        $kategori = $request->input('kategori');
        
        //query like data gedung dan data kategori ruangan
        $data = Ruangan::join('gedung', 'ruangan.gedung_id', '=', 'gedung.id')
            ->join('kategori_ruangan', 'ruangan.kategori_ruangan_id', '=', 'kategori_ruangan.id')
            ->where('ruangan.gedung_id', $gedung )
            ->where('ruangan.kategori_ruangan_id',$kategori )
            ->get();
        // dd($data);
        return view('layouts.list-search', compact('data'));
    }
    
}
