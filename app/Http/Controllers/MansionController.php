<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Mansion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MansionController extends Controller
{
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
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        dd();
        // $searchRuangan = Mansion::where('gedung_id', '=', $mansion->id);
        // dd($searchRuangan->nama_ruangan);
        // return view('mansion.index', compact('searchRuangan'));
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
     * @param  \App\Models\Mansion  $mansion
     * @return \Illuminate\Http\Response
     */
    // public function show(Mansion $mansion)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mansion  $mansion
     * @return \Illuminate\Http\Response
     */
    // public function edit(Mansion $mansion)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mansion  $mansion
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Mansion $mansion)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mansion  $mansion
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Mansion $mansion)
    // {
    //     //
    // }
}
