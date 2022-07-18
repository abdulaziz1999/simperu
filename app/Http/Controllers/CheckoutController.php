<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\WaktuPeminjaman;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class CheckoutController extends Controller
{
    public function customerDetail(Request $request)
    {
        return view('checkout.customerDetail', compact('request'));
    }

    public function store(Request $request)
    {
        //Table Feedback
        $feedback = Feedback::create([
            'poin' => 0,
            'keterangan_feedback' => ''
        ]);
        // Mengganti nilai nomer_telefon dari session peminjaman
        $request->session()->put('pembayaran.nomer_telefon', $request->nomer_tel);

        // Post ke database
        // Table Pembayaran
        $pembayaran = Pembayaran::create($request->session()->get('pembayaran'));

        // Table Peminjaman
        $request->session()->put('peminjaman.pembayaran_id', $pembayaran->id);
        $request->session()->put('peminjaman.feedback_id', $feedback->id);
        $peminjaman = Peminjaman::create($request->session()->get('peminjaman'));
        // return dd([$request->session()->all(), $pembayaran, $peminjaman]);

        // Table Waktu_Peminjaman
        $request->session()->put('waktu_peminjaman.peminjaman_id', $peminjaman->id);
        $waktu_peminjaman = WaktuPeminjaman::create($request->session()->get('waktu_peminjaman'));


        return redirect()->route('checkout.payment', [$waktu_peminjaman->id]);
    }

    public function payment(Request $request, WaktuPeminjaman $waktu_peminjaman)
    {
        // Hapus semua session
        foreach (['ruangan', 'pembayaran', 'peminjaman', 'waktu_peminjaman', 'harga_ruangan', 'total_harga_ruangan', 'durasi'] as $item) {
            if ($request->session()->has($item)) {
                $request->session()->forget($item);
            }
        }

        $waktu_peminjaman = WaktuPeminjaman::find($waktu_peminjaman->id);

        $countDown = [
            'first' => date_format($waktu_peminjaman->created_at, 'Y-m-d H:i:s'),
            'second' => date('Y-m-d H:i:s', strtotime(date_format($waktu_peminjaman->created_at, 'Y-m-d H:i:s') . '+6 hours'))
        ];

        return view('checkout.payment', compact('waktu_peminjaman', 'countDown'));
    }
}
