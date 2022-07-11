<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Ruangan;
use App\Models\KategoriRuangan;
use App\Models\Fasilitas;
use App\Models\Feedback;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //get all data gedung order by id desc
        $gedung = Gedung::all();
        $ruangan = Ruangan::all();
        $fasilitas = Fasilitas::all();
        $kategoriRuangan = KategoriRuangan::all(); 
        $feedback = Feedback::all();
        return view('admin-dashboard.index', compact('gedung','ruangan','kategoriRuangan','fasilitas','feedback'));
   }
}
