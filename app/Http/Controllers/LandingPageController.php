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
        $gedung     = Gedung::limit(3)->get();
        $ruangan    = Ruangan::limit(3)->get();
        $kategori   = KategoriRuangan::limit(3)->get();
        $fasilitas  = FasilitasRuangan::limit(6)->get();

        return view('layouts.index', compact('fasilitas', 'gedung', 'ruangan', 'kategori'))->with('i');
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gedung'    => 'required',
            'kategori'  => 'required'
        ], [
            'gedung.required'   => 'Pilih gedung terlebih dahulu!',
            'kategori.required' => 'Pilih kategori terlebih dahulu!'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('toast_error', $validator->messages()->first());
        }

        //query filter data gedung dan data kategori ruangan ke dalam session
        session([
            'gedung_id'     => $request->input('gedung'),
            'kategori_id'   => $request->input('kategori')
        ]);

        return redirect()->route('list-ruangan.showAllRoom');
    }
}
