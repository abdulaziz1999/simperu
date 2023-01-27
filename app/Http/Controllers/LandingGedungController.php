<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use App\Models\Ruangan;
use App\Models\KategoriRuangan;


class LandingGedungController extends Controller
{
    // FORMATER
    // Function formating ke rupiah
    public function formatRupiah($val)
    {
        return 'Rp. ' . number_format($val, 0, '.', ',');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function show(Request $request, $id)
    {
        $gedung = Gedung::find($id);
        $list_ruangan = Ruangan::where('gedung_id', $id)
            ->latest()
            ->paginate(6);

        foreach ($list_ruangan as $ls) {
            $ls->harga = $this->formatRupiah($ls->harga);
        }
        // return dd($list_ruangan);
        return view('layouts.details-gedung', compact('gedung', 'list_ruangan'));
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
