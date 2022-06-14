<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $gedung = Gedung::latest()->paginate(5);
        return view('admin-gedung.index', compact('gedung'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin-gedung.create');
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
        $request->validate([
            'kode' => 'required',
            'nama_gedung' => 'required',
            'alamat' => 'required',
        ]);
        Gedung::create($request->all());
        return redirect('/gedung')->with('success', 'Data Gedung Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function show(Gedung $gedung)
    {
        //
        $gedung = Gedung::find($gedung->id);
        return view('admin-gedung.show', compact('gedung'));
        return view('admin-gedung.show')->with('gedung', $gedung);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function edit(Gedung $gedung)
    {
        //
        $gedung = Gedung::find($gedung->id);
        return view('admin-gedung.edit', compact('gedung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gedung $gedung)
    {
        //
        $request->validate([
            'kode' => 'required',
            'nama_gedung' => 'required',
            'alamat' => 'required',
        ]);
        $gedung->update($request->all());
        return redirect('/gedung')->with('success', 'Data Gedung Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gedung $gedung)
    {
        //
        $gedung->delete();
        return redirect('/gedung')->with('success', 'Data Gedung Berhasil Dihapus');
    }
}
