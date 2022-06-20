<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\KategoriRuangan;
use App\Models\Gedung;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = Ruangan::latest()->paginate(5);
        return view('admin-ruangan.index', compact('ruangan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriRuangan = KategoriRuangan::all();
        $gedung = Gedung::all();
        $ruangan = Ruangan::all();
        return view('admin-ruangan.create', compact('kategoriRuangan', 'gedung', 'ruangan'));
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
            'nama_ruangan' => 'required',
            'kategori_ruangan_id' => 'required',
            'gedung_id' => 'required',
            'kapasitas' => 'required|numeric',
            'lantai' => 'required|numeric',
            'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'harga' => 'required|numeric',
        ]);

        $input = $request->all();

        if ($image = $request->file('foto1', 'foto2', 'foto3')) {
            $destinationPath = 'img/ruangan/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto1'] = "$profileImage";
            $input['foto2'] = "$profileImage";
            $input['foto3'] = "$profileImage";
        }

        Ruangan::create($input);

        return redirect()->route('ruangan.index')
            ->with('success', 'Ruangan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        $kategoriRuangan = KategoriRuangan::find($ruangan->kategori_ruangan_id);
        $gedung = Gedung::find($ruangan->gedung_id);
        $ruangan = Ruangan::find($ruangan->id);
        return view('admin-ruangan.show', compact('kategoriRuangan', 'gedung', 'ruangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruangan $ruangan)
    {
        $kategoriRuangan = KategoriRuangan::all();
        $gedung = Gedung::all();
        $ruangan = Ruangan::find($ruangan->id);
        return view('admin-ruangan.edit', compact('ruangan', 'kategoriRuangan', 'gedung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'nama_ruangan' => 'required',
            'kategori_ruangan_id' => 'required',
            'gedung_id' => 'required',
            'kapasitas' => 'required|numeric',
            'lantai' => 'required|numeric',
            'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'harga' => 'required|numeric',
        ]);

        $input = $request->all();

        if ($image = $request->file(['foto1', 'foto2', 'foto3'])) {
            $destinationPath = 'img/ruangan/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto1'] = "$profileImage";
            $input['foto2'] = "$profileImage";
            $input['foto3'] = "$profileImage";
        } else {
            unset($input['foto1']);
            unset($input['foto2']);
            unset($input['foto3']);
        }

        $ruangan->update($input);
        return redirect()->route('ruangan.index')->with('success', 'Data Ruangan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return redirect()->route('ruangan.index')->with('success', 'Data Ruangan Berhasil Dihapus');
    }
}
