<?php

namespace App\Http\Controllers;

use App\Console\Kernel;
use App\Models\KategoriRuangan;
use Illuminate\Http\Request;

class KategoriRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriRuangan = KategoriRuangan::latest()->paginate(5);
        return view('admin-kategoriRuangan.index', compact('kategoriRuangan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-kategoriRuangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);
        KategoriRuangan::create($request->all());
        return redirect('/kategoriRuangan')->with('success', 'Data Kategori Ruangan Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriRuangan  $kategoriRuangan
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriRuangan $kategoriRuangan)
    {
        $kategoriRuangan = KategoriRuangan::find($kategoriRuangan->id);
        return view('admin-kategoriRuangan.show')->with('kategoriRuangan', $kategoriRuangan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriRuangan  $kategoriRuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriRuangan $kategoriRuangan)
    {
        $kategoriRuangan = KategoriRuangan::find($kategoriRuangan->id);
        return view('admin-kategoriRuangan.edit', compact('kategoriRuangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriRuangan  $kategoriRuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriRuangan $kategoriRuangan)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);
        $kategoriRuangan->update($request->all());
        return redirect('/kategoriRuangan')->with('success', 'Kategori Ruangan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriRuangan  $kategoriRuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriRuangan $kategoriRuangan)
    {
        $kategoriRuangan->delete();
        return redirect('/kategoriRuangan')->with('success', 'Data Kategori Ruangan Berhasil Dihapus');
    }
}
