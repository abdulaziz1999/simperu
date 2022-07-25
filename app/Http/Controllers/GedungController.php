<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\Exports\GedungExport;
use Maatwebsite\Excel\Facades\Excel;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all data gedung order by id desc
        $gedung = Gedung::orderBy('id', 'desc')->get();
        return view('admin-gedung.index', compact('gedung'));
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
            'foto' => 'required|image|file|max:1024',
            'alamat' => 'required',
            'link_gmaps' => 'required',
            'link_iframe_gmaps' => 'required',
        ]);

        $data = Gedung::create($request->all());

        if ($request->hasFile('foto')) {
            // 1. Mengambil nama dari foto
            $image = $request->file('foto')->getClientOriginalName();
            // 2. Membuat profil nama untuk foto
            $profileImage = date('YmdHis') . "." . $image;
            // 3. Mengupload ke lokal public/storage/post-image
            $request->file('foto')->storeAs('post-image', $profileImage);
            // 4. Mengganti nilai foto dengan nama profilIMage
            $data->foto = $profileImage;
            // 5. Menyimpan kembali
            $data->save();
        }
        return redirect()->route('gedung.index')->with('success', 'Data Gedung Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function show(Gedung $gedung)
    {
        return view('admin-gedung.show', compact('gedung'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function edit(Gedung $gedung)
    {
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
            // 'foto' => 'required|image|file|max:1024',
            'alamat' => 'required'
        ]);

        // 1. Mengambil semua nilai request
        $input = $request->all();
        // 2. Mengecek apabila ada file dengan name 'foto'
        if ($request->hasFile('foto')) {
            // 3. Mengambil nama dari foto
            $image = $request->file('foto')->getClientOriginalName();
            // 4. Membuat profil nama untuk foto
            $profileImage = date('YmdHis') . "." . $image;
            // 5. Hapus foto lama
            $oldFoto = 'post-image/' . $input['old-image'];
            Storage::delete($oldFoto);
            // 5. Mengupload ke lokal public/storage/post-image
            $request->file('foto')->storeAs('post-image', $profileImage);
            // 6. Mengganti nilai foto dengan nama profil foto sebelum di update
            $input['foto'] = $profileImage;
        }
        // 7. lalu update;
        $gedung->update($input);

        return redirect()->route('gedung.index')->with('success', 'Data Gedung Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gedung $gedung, Ruangan $ruangan)
    {
        $oldFoto = 'post-image/' . $gedung->foto;
        Storage::delete($oldFoto);

        Ruangan::where('gedung_id', $gedung->id)->delete();
        $gedung->delete();

        return redirect()->route('gedung.index')->with('success', 'Data Gedung Berhasil Dihapus');
    }

    public function generatePDF()
    {
        $data = Gedung::orderBy('id', 'desc')->get();
        $pdf = PDF::loadView('admin-gedung/pdf', ['gedung' => $data]);

        return $pdf->download('gedung.pdf');
    }

    public function generateExcel()
    {
        return Excel::download(new GedungExport, date('d-m-y') . '_Gedung.xlsx');
    }
}
