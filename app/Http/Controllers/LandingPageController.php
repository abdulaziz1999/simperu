<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Gedung;
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
        $gedung = Gedung::select('nama_gedung')->get();
        //data gedung dan data kategori ruangan
        $kategoriRuangan = KategoriRuangan::latest()->paginate(6);
        // dd([$gedung, $kategoriRuangan]);
        return view('layouts.index', compact('fasilitasGroup', 'gedung', 'kategoriRuangan'))->with('i');
    }
}
