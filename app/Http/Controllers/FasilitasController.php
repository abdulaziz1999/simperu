<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = Fasilitas::all();
        $ruangan = Ruangan::all();
        return view('admin-fasilitas.index', compact('fasilitas', 'ruangan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ruangan = Ruangan::all();
        return view('admin-fasilitas.create', compact('ruangan'));
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
            'foto' => 'required|image|file|max:1024',
            'keterangan' => 'required',
            'ruangan_id' => 'required'
        ]);

        $data = Fasilitas::create($request->all());

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
    public function show(Fasilitas $fasilita)
    {
        // Catatan : Larvel secara langsung merubah param dari yang belakangnya 's', menjadi dihilangkan. Dan apabila 'ies' menjadi 'y'.
        // https://stackoverflow.com/questions/60074365/laravel-5-8-edit-function-returns-connection-null-and-table-null-when-i-dump
        // Disini saya mengganti 'fasilitas' dengan 'fasilita'
        // Untuk mengetahuinya bisa me-list route dengan command 
        // php artisan route:list
        return view('admin-fasilitas.show', compact('fasilita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilita)
    {
        $ruangan = Ruangan::all();
        return view('admin-fasilitas.edit', compact('fasilita', 'ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasilitas $fasilita)
    {
        //
        $request->validate([
            'nama_fasilitas' => 'required',
            'foto' => 'required|image|file|max:1024',
            'keterangan' => 'required',
            'ruangan_id' => 'required'
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
    public function destroy(Fasilitas $fasilita)
    {
        // 1. Membuat path+namafoto sebagai pathnya.
        $oldFoto = 'post-image/' . $fasilita->foto;
        // 2. Mengahapus file di lokal
        Storage::delete($oldFoto);
        // 3. Menghapus data di database
        $fasilita->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Data fasilitas Berhasil Dihapus');
    }
}
