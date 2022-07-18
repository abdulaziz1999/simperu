<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Ruangan;
use App\Models\KategoriRuangan;
use App\Models\WaktuPeminjaman;
use App\Models\Peminjaman;
use App\Models\Fasilitas;
use App\Models\Feedback;
use Illuminate\Http\Request;
Use DB;

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
        $peminjaman = Peminjaman::join('pembayaran as pe', 'peminjaman.pembayaran_id', '=', 'pe.id')
                    ->join('ruangan as ru', 'peminjaman.ruangan_id', '=', 'ru.id')
                    ->join('users', 'peminjaman.peminjam_id', '=', 'users.id')
                    ->limit(5)
                    ->get();
        $sumProfit = Peminjaman::join('pembayaran as pe', 'peminjaman.pembayaran_id', '=', 'pe.id')
                    ->join('ruangan as ru', 'peminjaman.ruangan_id', '=', 'ru.id')
                    ->where('pe.status_pembayaran', '=', 'Lunas')
                    ->sum('ru.harga');
        return view('admin-dashboard.index', compact('gedung','ruangan','kategoriRuangan','fasilitas','feedback', 'sumProfit', 'peminjaman'));
   }

    public function chart()
    {
        $start_date     = date('Y-m-d');  
        $date           = strtotime($start_date);
        $date           = strtotime("-7 day", $date);
        $tgl_awal       = date('Y-m-d', $date);
        $tgl_akhir      = date('Y-m-d');
        while (strtotime($tgl_awal) <= strtotime($tgl_akhir)) {
            $tgl[] = $tgl_awal;
            $peminjam[] = Peminjaman::whereDate('created_at', $tgl_awal)->count();
            $tgl_awal = date ("Y-m-d", strtotime("+1 day", strtotime($tgl_awal)));
        }
        $datasets[] = [
                'label'                 => "Peminjaman",
                'data'                  => $peminjam,
                'backgroundColor'       => 'transparent',
                'borderColor'           => '#7571F9',
                'borderWidth'           => 3,
                'pointStyle'            => 'circle',
                'pointRadius'           => 5,
                'pointBorderColor'      => 'transparent',
                'pointBackgroundColor'  => '#7571F9',
        ];
        $data = [
            'labels'            => $tgl,
            'type'              => 'line',
            'defaultFontFamily' => 'Montserrat',
            'datasets'          => $datasets
        ];
        echo json_encode($data);
    }
}
