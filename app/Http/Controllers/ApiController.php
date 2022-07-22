<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\KategoriRuangan;
use App\Models\Gedung;
use App\Models\Fasilitas;
use App\Models\User;

class ApiController extends Controller
{
    //API Gedung
    public function gedung(Request $request)
    {
        //header with content type, language, charset, key authorization
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        // header('Authorization: Bearer ' . env('API_KEY'));
            $gedung = Gedung::all();
            return response()->json($gedung);
    }

    public function gedungById(Request $request, $id)
    {
        //header with content type, language, charset, key authorization
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        header('apikey: aziz');
        //if apikey header value is not correct, return error
        // $apikey = $request->header('apikey');
        // if ($apikey != 'aziz') {
        //     return response()->json(['error' => 'Invalid API key'], 401);
        // }else{
            $gedung = Gedung::find($id);
            if($gedung) {
                return response()->json($gedung);
            } else {
                return response()->json(['message' => 'Gedung tidak ditemukan']);
            }
        // }
    }

    //Api Ruangan
    public function ruangan()
    {
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        // header('Authorization: Bearer ' . env('API_KEY'));
        $ruangan = Ruangan::all();
        return response()->json($ruangan);
    }

    public function ruanganById($id)
    {
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        // header('Authorization: Bearer ' . env('API_KEY'));
        $ruangan = Ruangan::find($id);
        if($ruangan) {
            return response()->json($ruangan);
        } else {
            return response()->json(['message' => 'Ruangan tidak ditemukan']);
        }
    }

    public function ruanganCreate(Request $request)
    {
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        // header('Authorization: Bearer ' . env('API_KEY'));
        $request->validate([
            'nama_ruangan'          => 'required|string|max:255',
            'kategori_ruangan_id'   => 'required|numeric',
            'gedung_id'             => 'required|numeric',
            'kapasitas'             => 'required|numeric',
            'lantai'                => 'required|numeric',
            'harga'                 => 'required|numeric',
            'keterangan'            => 'required',
        ]);
        $data = Ruangan::create($request->all());
        $data->foto1 = $this->upload_foto($request, 'foto1');
        $data->foto2 = $this->upload_foto($request, 'foto2');
        $data->foto3 = $this->upload_foto($request, 'foto3');
        $data->save();
        return response()->json($data);
    }

    public function ruanganUpdate(Request $request, $id)
    {
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        // header('Authorization: Bearer ' . env('API_KEY'));
        $request->validate([
            'nama_ruangan'          => 'required|string|max:255',
            'kategori_ruangan_id'   => 'required|numeric',
            'gedung_id'             => 'required|numeric',
            'kapasitas'             => 'required|numeric',
            'lantai'                => 'required|numeric',
            'harga'                 => 'required|numeric',
            'keterangan'            => 'required',
        ]);
        $data = Ruangan::find($id);
        $data->nama_ruangan = $request->nama_ruangan;
        $data->kategori_ruangan_id = $request->kategori_ruangan_id;
        $data->gedung_id = $request->gedung_id;
        $data->kapasitas = $request->kapasitas;
        $data->lantai = $request->lantai;
        $data->harga = $request->harga;
        $data->keterangan = $request->keterangan;
        $data->foto1 = $this->upload_foto($request, 'foto1');
        $data->foto2 = $this->upload_foto($request, 'foto2');
        $data->foto3 = $this->upload_foto($request, 'foto3');
        $data->save();
        return response()->json($data);
    }

    public function ruanganDelete($id)
    {
        //
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        // header('Authorization: Bearer ' . env('API_KEY'));
        $data = Ruangan::find($id);
        $oldFoto1 = 'post-image/' . $data->foto1;
        $oldFoto2 = 'post-image/' . $data->foto2;
        $oldFoto3 = 'post-image/' . $data->foto3;
        // 2. Mengahapus file di lokal
        Storage::delete([$oldFoto1, $oldFoto2, $oldFoto3]);
        // 3. Menghapus data di database
        $data->delete();
        return response()->json($data);
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

    // API Kategoori Ruangan
    public function kategoriRuangan()
    {
        //
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        // header('Authorization: Bearer ' . env('API_KEY'));
        $kategoriRuangan = KategoriRuangan::all();
        return response()->json($kategoriRuangan);
    }

    public function kategoriRuanganById($id)
    {
        //
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        // header('Authorization: Bearer ' . env('API_KEY'));
        $kategoriRuangan = KategoriRuangan::find($id);
        if($kategoriRuangan) {
            return response()->json($kategoriRuangan);
        } else {
            return response()->json(['message' => 'Kategori Ruangan tidak ditemukan']);
        }
    }

    //API Fasilitas
    public function fasilitas()
    {
        //
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        // header('Authorization: Bearer ' . env('API_KEY'));
        $fasilitas = Fasilitas::all();
        return response()->json($fasilitas);
    }

    public function fasilitasById($id){
        //
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        // header('Authorization: Bearer ' . env('API_KEY'));
        $fasilitas = Fasilitas::find($id);
        if($fasilitas) {
            return response()->json($fasilitas);
        } else {
            return response()->json(['message' => 'Fasilitas tidak ditemukan']);
        }
    }

    public function user(){
        //
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        // header('Authorization: Bearer ' . env('API_KEY'));
        $user = User::all();
        return response()->json($user);
    }

    public function userById($id){
        //
        header('Content-Type: application/json');
        header('Accept-Language: en-US');
        header('Accept-Charset: UTF-8');
        // header('Authorization: Bearer ' . env('API_KEY'));
        $user = User::find($id);
        if($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User tidak ditemukan']);
        }
    }

}
