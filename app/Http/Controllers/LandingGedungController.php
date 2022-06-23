<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use App\Models\Ruangan;
use App\Models\KategoriRuangan;


class LandingGedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $gedung = Gedung::all();
        // $ruangan = Ruangan::all();
        // dd($ruangan);
        // return view('layouts.list-gedung', compact('gedung', 'ruangan'))->with('i');
        // $ruangan = Ruangan::latest()->paginate(5);
        // return view('mansion.page2', compact('ruangan'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        $gedung = Gedung::latest()->paginate(6);
        return view('layouts.gedung', compact('gedung'))->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function show(Ruangan $list_gedung)
    {
        // $kategoriRuangan = KategoriRuangan::find($ruangan->kategori_ruangan_id);
        $gedung = Gedung::find($list_gedung->gedung_id);
        $list_gedung = Ruangan::find($list_gedung->id);
        // dd($ruangan);
        dd($gedung);
        // return view('layouts.details-gedung', compact( 'gedung', 'ruangan'));
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
    public function update(Request $request, $id)
    {
        //
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
