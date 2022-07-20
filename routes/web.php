<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KategoriRuanganController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LandingGedungController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LaporanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['checkRole:admin']], function () {
    Route::get('/admin', [DashboardController::class, 'index'])->middleware('checkRole:admin');
    Route::get('/chart', [DashboardController::class, 'chart'])->middleware('checkRole:admin');
    //route gedung admin
    Route::resource('gedung', GedungController::class);
    Route::get('gedungexcel', [GedungController::class, 'generateExcel']);
    Route::get('gedungpdf', [GedungController::class, 'generatePDF']);

    //route fasilitas admin
    Route::resource('fasilitas', FasilitasController::class);
    Route::get('fasilitasexcel', [FasilitasController::class, 'generateExcel']);
    Route::get('fasilitaspdf', [FasilitasController::class, 'generatePDF']);

    //route kategori ruangan admin
    Route::resource('kategoriRuangan', KategoriRuanganController::class);
    Route::get('kategoriRuanganexcel', [KategoriRuanganController::class, 'generateExcel']);
    Route::get('kategoriRuanganpdf', [KategoriRuanganController::class, 'generatePDF']);

    //route ruangan admin
    Route::resource('ruangan', RuanganController::class);
    Route::get('ruanganexcel', [RuanganController::class, 'generateExcel']);
    Route::get('ruanganpdf', [RuanganController::class, 'generatePDF']);

    //route feedback admin
    Route::resource('feedback', FeedbackController::class);
    Route::get('feedbackexcel', [FeedbackController::class, 'generateExcel']);
    Route::get('feedbackpdf', [FeedbackController::class, 'generatePDF']);

    //route user admin
    Route::resource('user', UserController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('laporan', LaporanController::class);

    //route profile
    Route::get('profile', [UserController::class, 'profile']);
});
//landing page root
Route::get('/', [LandingPageController::class, 'index_landing_page']);
Route::post('/search', [LandingPageController::class, 'search']);

Route::resource('list-gedung', LandingGedungController::class);

// Hak akses hanya untuk admin dan peminjaman
Route::group(['middleware' => ['checkRole:admin,peminjam']], function () {
    // Fitur LIST-RUANGAN
    Route::post('list-ruangan/{ruangan:id}', [
        'uses' => 'App\Http\Controllers\ListRuanganController@store',
        'as' => 'list-ruangan.store'
    ]);

    // Fitur CHECKOUT
    Route::get('checkout/customer-detail', [
        'uses' => 'App\Http\Controllers\CheckoutController@customerDetail',
        'as' => 'checkout.customerDetail'
    ]);
    Route::post('checkout/customer-detail', [
        'uses' => 'App\Http\Controllers\CheckoutController@store',
        'as' => 'checkout.store'
    ]);
    Route::get('checkout/payment/{waktu_peminjaman:id}', [
        'uses' => 'App\Http\Controllers\CheckoutController@payment',
        'as' => 'checkout.payment'
    ]);

    // Fitur PEMINJAMANKU
    Route::get('peminjamanku', [
        'uses' => 'App\Http\Controllers\PeminjamankuController@index',
        'as' => 'peminjamanku.index'
    ]);
    Route::post('peminjamanku/available-countdown', [
        'uses' => 'App\Http\Controllers\PeminjamankuController@availableCountdown',
        'as' => 'peminjamanku.availableCountdown'
    ]);
    Route::put('peminjamanku/{peminjaman:id}', [
        'uses' => 'App\Http\Controllers\PeminjamankuController@update',
        'as' => 'peminjamanku.update'
    ]);
    Route::get('peminjamanku/{pembayaran:id}/invoice', [
        'uses' => 'App\Http\Controllers\PeminjamankuController@invoice',
        'as' => 'peminjamanku.invoice'
    ]);
});

// fitur TENTANG KAMI
Route::get('/tentang-kami', function () {
    $data = [
        'i' => 0,
        'inspirasi' => [
            ['image' => 'img/inspirasi-1.jpg', 'head' => 'Fleksibilitas', 'title' => 'Terinspirasi dari fleksibilitas industri penerbangan dalam menawarkan variasi harga dan pelayanan, Simperu ingin menghadirkan fleksibilitas harga dan pelayanan dengan konsep yang serupa pada proses sewa di industri properti yang dikenal kaku dan sangat tradisional.'],
            ['image' => 'img/inspirasi-2.jpg', 'head' => 'Teknologi sebagai Manfaat Inti', 'title' => 'Industri mobil dan otomotif memberikan inspirasi bagaimana teknologi telah mengubah apa yang ditawarkan kepada konsumen. Dari fungsi dasar sebuah kendaraan, kini industri mobil menawarkan technology as core feature dalam menambah kenyamanan dan keselamatan pengendara.'],
            ['image' => 'img/inspirasi-3.jpg', 'head' => 'Lingkungan', 'title' => 'Framework "15 minute neighbourhood" yang dicanangkan oleh Prof. Carlos Moreno di Paris mengedepankan akses pada 6 pilar aktivitas dalam 15 menit dengan berjalan kaki atau naik sepeda. Framework ini adalah solusi urban mobility dalam menghadapi pandemi dan issue global warming.'],
        ],
        'tim' => [
            ['nama' => 'Abdul Aziz', 'jobdesk' => 'Project Manager, Beckend Developer', 'link-profile-ig' => ''],
            ['nama' => 'Ahmad Hafid F', 'jobdesk' => 'UI/UX', 'link-profile-ig' => 'https://cdn.inflact.com/media/285913551_1382255525613404_2934192229411735561_n.jpg?url=https%3A%2F%2Fscontent.cdninstagram.com%2Fv%2Ft51.2885-19%2F285913551_1382255525613404_2934192229411735561_n.jpg%3Fstp%3Ddst-jpg_s320x320%26_nc_ht%3Dinstagram.fcfc2-1.fna.fbcdn.net%26_nc_cat%3D108%26_nc_ohc%3Do7udChWg9EkAX843TD8%26edm%3DAAWvnRQBAAAA%26ccb%3D7-5%26oh%3D00_AT8IhGVzX07ik_TlMJevfo16t0OZFQ0ge4955dXydga4Gw%26oe%3D62DE5C19%26_nc_sid%3De7738c&time=1658314800&key=342bf0ccd0027fd5c61032bb04e66a5d'],
            ['nama' => 'Ayu Widya N', 'jobdesk' => 'Analisis Bisnis Proses', 'link-profile-ig' => 'https://cdn.inflact.com/media/283516161_519854499693406_2514515185744214607_n.jpg?url=https%3A%2F%2Fscontent.cdninstagram.com%2Fv%2Ft51.2885-19%2F283516161_519854499693406_2514515185744214607_n.jpg%3Fstp%3Ddst-jpg_s320x320%26_nc_ht%3Dinstagram.fbpn2-1.fna.fbcdn.net%26_nc_cat%3D110%26_nc_ohc%3DjxjWhAjrudgAX-Z9j3I%26edm%3DAAWvnRQBAAAA%26ccb%3D7-5%26oh%3D00_AT_rvDtfHMMm7OxOEOmd8WQ_pln_OsOuL6C8h19qVM-nYA%26oe%3D62DF18D2%26_nc_sid%3De7738c&time=1658314800&key=66ddc5045bece3b5e1a551c5b9db0efd'],
            ['nama' => 'Derren Dwi S', 'jobdesk' => 'Dokumentasi & PPT', 'link-profile-ig' => 'https://cdn.inflact.com/media/274385837_253476633641758_7970455290471442522_n.jpg?url=https%3A%2F%2Fscontent.cdninstagram.com%2Fv%2Ft51.2885-19%2F274385837_253476633641758_7970455290471442522_n.jpg%3Fstp%3Ddst-jpg_s320x320%26_nc_ht%3Dscontent-prg1-1.cdninstagram.com%26_nc_cat%3D110%26_nc_ohc%3Dyfm6z7MQC-cAX9BboB6%26edm%3DAAWvnRQBAAAA%26ccb%3D7-5%26oh%3D00_AT9ts5dkdPDMSraO2MEijY_Er0fgbWyuQz_YjbcfkQHPCw%26oe%3D62DF78D2%26_nc_sid%3De7738c&time=1658314800&key=c6bee8557a44d742a2252027ecb53b65https://cdn.inflact.com/media/274385837_253476633641758_7970455290471442522_n.jpg?url=https%3A%2F%2Fscontent.cdninstagram.com%2Fv%2Ft51.2885-19%2F274385837_253476633641758_7970455290471442522_n.jpg%3Fstp%3Ddst-jpg_s320x320%26_nc_ht%3Dscontent-prg1-1.cdninstagram.com%26_nc_cat%3D110%26_nc_ohc%3Dyfm6z7MQC-cAX9BboB6%26edm%3DAAWvnRQBAAAA%26ccb%3D7-5%26oh%3D00_AT9ts5dkdPDMSraO2MEijY_Er0fgbWyuQz_YjbcfkQHPCw%26oe%3D62DF78D2%26_nc_sid%3De7738c&time=1658314800&key=c6bee8557a44d742a2252027ecb53b65'],
            ['nama' => 'Ficri Hanip', 'jobdesk' => 'Frontend Developer', 'link-profile-ig' => 'https://cdn.inflact.com/media/290247515_1866279330236562_4592455839549479891_n.jpg?url=https%3A%2F%2Fscontent.cdninstagram.com%2Fv%2Ft51.2885-19%2F290247515_1866279330236562_4592455839549479891_n.jpg%3Fstp%3Ddst-jpg_s320x320%26_nc_ht%3Dinstagram.fhan2-1.fna.fbcdn.net%26_nc_cat%3D106%26_nc_ohc%3DZ0kxQZUdXmIAX9zWU7P%26edm%3DAAWvnRQBAAAA%26ccb%3D7-5%26oh%3D00_AT9Yc219xBrjFMkc0tr3_MO3rOQUf518WADby_nlvu0-1Q%26oe%3D62DF0F2F%26_nc_sid%3De7738c&time=1658314800&key=bbf5780c64345d72e43d85ecc631bb59']
        ]
    ];
    return view('layouts.tentang-kami', compact('data'));
});

// fitur KONTAK KAMI
Route::get('/kontak-kami', function () {
    $data = [
        'i' => 0,
        'form-select-tipe' => ['suggestion', 'aditional service', 'room / space overtime', 'inquiry', 'complain', 'home fixing', 'room cleaning']
    ];
    // return dd($data['form-select-tipe'][0]);
    return view('layouts.kontak-kami', compact('data'));
});

//ficri
// Fitur LIST-RUANGAN
Route::get('list-ruangan', [
    'uses' => 'App\Http\Controllers\ListRuanganController@showAllRoom',
    'as' => 'list-ruangan.showAllRoom'
]);
Route::post('list-ruangan', [
    'uses' => 'App\Http\Controllers\ListRuanganController@showAllRoom',
    'as' => 'list-ruangan.showAllRoom'
]);
Route::get('list-ruangan/{ruangan:id}', [
    'uses' => 'App\Http\Controllers\ListRuanganController@detailRoomById',
    'as' => 'list-ruangan.detailRoomById'
]);
Route::post('list-ruangan/{ruangan:id}/{tgl}', [
    'uses' => 'App\Http\Controllers\ListRuanganController@availableDate',
    'as' => 'list-ruangan.availableDate'
]);

// 
Route::get('/redirects', function () {
    return redirect(Redirect::intended()->getTargetUrl());
    return redirect()->back();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
