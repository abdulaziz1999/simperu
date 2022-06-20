<?php

namespace App\Http\Controllers;

use App\Models\Simperu;
use Illuminate\Http\Request;

class SimperuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.index');
    }

    public function gedung()
    {
        $simperu = Simperu::all();
        return view('layouts.gedung', compact('simperu'));
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
     * @param  \App\Models\Simperu  $simperu
     * @return \Illuminate\Http\Response
     */
    public function show(Simperu $simperu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simperu  $simperu
     * @return \Illuminate\Http\Response
     */
    public function edit(Simperu $simperu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Simperu  $simperu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Simperu $simperu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simperu  $simperu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simperu $simperu)
    {
        //
    }
}
