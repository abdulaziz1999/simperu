<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\FasilitasRuangan;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\Exports\FasilitasExport;
use Maatwebsite\Excel\Facades\Excel;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = FasilitasRuangan::all();
        return view('admin-fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-fasilitas.create');
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
            'nama_fasilitas' => 'required',
            'foto'           => 'required|image|file|max:1024',
            'keterangan'     => 'required'
        ]);

        $data = FasilitasRuangan::create($request->all());

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

        return redirect()->route('fasilitas.index')->with('success', 'Data Fasilitas Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasRuangan $fasilita)
    {
        return view('admin-fasilitas.show', compact('fasilita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasRuangan $fasilita)
    {
        return view('admin-fasilitas.edit', compact('fasilita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FasilitasRuangan $fasilita)
    {
        //
        $request->validate([
            'nama_fasilitas' => 'required',
            // 'foto' => 'required|image|file|max:1024',
            'keterangan' => 'required'
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
        $fasilita->update($input);

        return redirect('/fasilitas')->with('success', 'Data fasilitas Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasRuangan $fasilita)
    {
        // 1. Membuat path+namafoto sebagai pathnya.
        $oldFoto = 'post-image/' . $fasilita->foto;
        // 2. Mengahapus file di lokal
        Storage::delete($oldFoto);
        // 3. Menghapus data di database
        $fasilita->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Data fasilitas Berhasil Dihapus');
    }

    public function generatePdf()
    {
        $data = FasilitasRuangan::all();
        $pdf = PDF::loadView('admin-fasilitas/pdf', ['fasilitas' => $data]);

        return $pdf->download('fasilitas.pdf');
    }

    public function generateExcel()
    {
        return Excel::download(new FasilitasExport, date('d-m-y') . '_fasilitas.xlsx');
    }
}
