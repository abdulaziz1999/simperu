<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\KategoriRuangan;
use App\Models\Gedung;
use App\Models\Fasilitas;
use App\Models\FasilitasRuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\Exports\RuanganExport;
use Maatwebsite\Excel\Facades\Excel;


class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = Ruangan::all();
        
        return view('admin-ruangan.index', compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gedung             = Gedung::all();
        $ruangan            = Ruangan::all();
        $fasilitas          = FasilitasRuangan::all();
        $kategoriRuangan    = KategoriRuangan::all();

        return view('admin-ruangan.create', compact('kategoriRuangan', 'gedung', 'ruangan', 'fasilitas'));
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
            'nama_ruangan'          => 'required',
            'kategori_ruangan_id'   => 'required',
            'gedung_id'             => 'required',
            'kapasitas'             => 'required|numeric',
            'lantai'                => 'required|numeric',
            'foto1'                 => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2'                 => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3'                 => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'                => 'required',
            'harga'                 => 'required|numeric',
        ]);

        $data = Ruangan::create($request->all());

        // return dd($data);
        if($data->foto1 != null && $data->foto2 != null && $data->foto3 != null){
            $data->foto1 = $this->upload_foto($request, 'foto1');
            $data->foto2 = $this->upload_foto($request, 'foto2');
            $data->foto3 = $this->upload_foto($request, 'foto3');
        }else if($data->foto1 != null && $data->foto2 != null){
            $data->foto1 = $this->upload_foto($request, 'foto1');
            $data->foto2 = $this->upload_foto($request, 'foto2');
        }else if($data->foto1 != null){
            $data->foto1 = $this->upload_foto($request, 'foto1');
        }
        $data->save();

        //foreach request fasilitas dan insert ke table fasilitas_ruangan
        foreach ($request->fasilitas as $fasilitas) {
            //insert ke table fasilitas_ruangan
            Fasilitas::create([
                'ruangan_id' => $data->id,
                'fasilitas_id' => $fasilitas,
            ]);
        }

        // return dd($data);
        return redirect()->route('ruangan.index')->with('success', 'Ruangan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        $kategoriRuangan    = KategoriRuangan::find($ruangan->kategori_ruangan_id);
        $gedung             = Gedung::find($ruangan->gedung_id);
        $ruangan            = Ruangan::find($ruangan->id);
        $fasilitas          = FasilitasRuangan::join('fasilitas', 'fasilitas_ruangan.id', '=', 'fasilitas.fasilitas_id')
                                            ->where('fasilitas.ruangan_id', $ruangan->id)
                                            ->select('fasilitas_ruangan.nama_fasilitas')
                                            ->get();
        // dd($fasilitas);
        return view('admin-ruangan.show', compact('kategoriRuangan', 'gedung', 'ruangan','fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruangan $ruangan)
    {
        $fasilitas          = FasilitasRuangan::all();
        $fasilitasRuangan   = Fasilitas::where('ruangan_id', $ruangan->id)->get();
        $ruangan            = Ruangan::find($ruangan->id);
        $gedung             = Gedung::all();
        $kategoriRuangan    = KategoriRuangan::all();

        // dd($fasilitasRuangan);
        return view('admin-ruangan.edit', compact('ruangan', 'kategoriRuangan', 'gedung', 'fasilitas', 'fasilitasRuangan'));
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
            'nama_ruangan'          => 'required',
            'kategori_ruangan_id'   => 'required',
            'gedung_id'             => 'required',
            'kapasitas'             => 'required|numeric',
            'lantai'                => 'required|numeric',
            'foto1'                 => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2'                 => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3'                 => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'                => 'required',
            'harga'                 => 'required|numeric',
        ]);

        $input = $request->all();
        // $input = Ruangan::update($request->all());
        if ($request->hasFile('foto1')) {
            # code...
            // hapus foto lama.
            $oldFoto1 = 'post-image/' . $input['oldimage1']->foto1;
            // $oldFoto2 = 'post-image/' . $input['oldimage2']->foto2;
            // $oldFoto3 = 'post-image/' . $input['oldimage3']->foto3;
            // 2. Mengahapus file di lokal
            Storage::delete([$oldFoto1]);
            $input['foto1'] = $this->upload_foto($request, 'foto1');
        }
        if ($request->hasFile('foto2')) {
            Storage::delete('post-image/' . $input['oldimage2']->foto2);
            $input['foto2'] = $this->upload_foto($request, 'foto2');
        }
        if ($request->hasFile('foto3')) {
            Storage::delete('post-image/' . $input['oldimage3']->foto3);
            $input['foto3'] = $this->upload_foto($request, 'foto3');
        }
        
        $ruangan->update($input);

        //jika ada fasilitas yang di unchecked maka hapus dari table fasilitas dan jika ada fasilitas yang di checked maka tambahkan ke table fasilitas
        $fasilitas = Fasilitas::where('ruangan_id', $ruangan->id)->get();
        $fasilitas_id = [];
        foreach ($fasilitas as $fasilitas) {
            $fasilitas_id[] = $fasilitas->fasilitas_id;
        }
        $fasilitas_checked = $request->fasilitas;
        $fasilitas_unchecked = array_diff($fasilitas_id, $fasilitas_checked);
        $fasilitas_checked = array_diff($fasilitas_checked, $fasilitas_id);

        //hapus fasilitas yang di unchecked
        foreach ($fasilitas_unchecked as $fasilitas) {
            Fasilitas::where('ruangan_id', $ruangan->id)->where('fasilitas_id', $fasilitas)->delete();
        }

        //tambah fasilitas yang di checked
        foreach ($fasilitas_checked as $fasilitas) {
            Fasilitas::create([
                'ruangan_id' => $ruangan->id,
                'fasilitas_id' => $fasilitas,
            ]);
        }

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
        // 1. Membuat path+namafoto sebagai pathnya.
        $oldFoto1 = 'post-image/' . $ruangan->foto1;
        $oldFoto2 = 'post-image/' . $ruangan->foto2;
        $oldFoto3 = 'post-image/' . $ruangan->foto3;
        // 2. Mengahapus file di lokal
        Storage::delete([$oldFoto1, $oldFoto2, $oldFoto3]);
        // 3. Menghapus data di database
        $ruangan->delete();
        //delete data fasilitas ruangan
        $fasilitasRuangan = FasilitasRuangan::where('id_ruangan', $ruangan->id);
        $fasilitasRuangan->delete();

        return redirect()->route('ruangan.index')->with('success', 'Data Ruangan Berhasil Dihapus');
    }

    public function upload_foto($request, $foto)
    {
        if ($request->hasFile($foto)) {
            // 1. Mengambil nama dari foto
            $image = $request->file($foto)->getClientOriginalName();
            // 2. Membuat profil nama untuk foto
            $profileImage = date('YmdHis') . "." . $image;
            // 3. Mengupload ke lokal public/storage/post-image
            $request->file($foto)->storeAs('post-image', $profileImage);
        }
        return $profileImage;
    }

    public function update_foto($request, $foto)
    {
        $input = $request->all();
        if ($request->hasFile($foto)) {
            // 1. Mengambil nama dari foto
            $image = $request->file($foto)->getClientOriginalName();
            // 2. Membuat profil nama untuk foto
            $profileImage = date('YmdHis') . "." . $image;

            // 3. Mengupload ke lokal public/storage/post-image
            $request->file($foto)->storeAs('post-image', $profileImage);
        }
        return $profileImage;
    }

    public function generatePDF()
    {
        $data = Ruangan::all();
        // dd($data);
        $pdf = PDF::loadView('admin-ruangan/pdf', ['ruangan' => $data]);
    
        return $pdf->download('Ruangan.pdf');
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function generateExcel()
    {
        return Excel::download(new RuanganExport, date('d-m-y') . '_Ruangan.xlsx');
    }

}
