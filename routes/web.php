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

//route gedung admin
Route::resource('gedung', GedungController::class)->middleware('checkRole:admin');
Route::get('gedungexcel', [GedungController::class, 'generateExcel'])->middleware('checkRole:admin');
Route::get('gedungpdf', [GedungController::class, 'generatePDF'])->middleware('checkRole:admin');

//route fasilitas admin
Route::resource('fasilitas', FasilitasController::class)->middleware('checkRole:admin');
Route::get('fasilitasexcel', [FasilitasController::class, 'generateExcel'])->middleware('checkRole:admin');
Route::get('fasilitaspdf', [FasilitasController::class, 'generatePDF'])->middleware('checkRole:admin');

//route kategori ruangan admin
Route::resource('kategoriRuangan', KategoriRuanganController::class)->middleware('checkRole:admin');
Route::get('kategoriRuanganexcel', [KategoriRuanganController::class, 'generateExcel'])->middleware('checkRole:admin');
Route::get('kategoriRuanganpdf', [KategoriRuanganController::class, 'generatePDF'])->middleware('checkRole:admin');

//route ruangan admin
Route::resource('ruangan', RuanganController::class)->middleware('checkRole:admin');
Route::get('ruanganexcel', [RuanganController::class, 'generateExcel'])->middleware('checkRole:admin');
Route::get('ruanganpdf', [RuanganController::class, 'generatePDF'])->middleware('checkRole:admin');

//route feedback admin
Route::resource('feedback', FeedbackController::class)->middleware('checkRole:admin');
Route::get('feedbackexcel', [FeedbackController::class, 'generateExcel'])->middleware('checkRole:admin');
Route::get('feedbackpdf', [FeedbackController::class, 'generatePDF'])->middleware('checkRole:admin');

//route user admin
Route::resource('user', UserController::class)->middleware('checkRole:admin');
Route::resource('peminjaman', PeminjamanController::class)->middleware('checkRole:admin');
Route::resource('laporan', LaporanController::class)->middleware('checkRole:admin');

//route profile
Route::get('profile', [UserController::class, 'profile'])->middleware('checkRole:admin');



//landing page root
Route::get('/', [LandingPageController::class, 'index_landing_page']);
Route::post('/search', [LandingPageController::class, 'search']);

Route::resource('list-gedung', LandingGedungController::class);
// Route::get('/list-gedung', [LandingGedungController::class, 'index']);
// Route::get('/details-gedung/{id}', [LandingGedungController::class, 'show']);


//ficri
// Fitur LIST-RUANGAN
Route::get('list-ruangan', [
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

// 
Route::get('/redirects', function () {
    return redirect(Redirect::intended()->getTargetUrl());
    return redirect()->back();
});

//---------------
Route::get('/alur-checkout-1', function () {
    return view('check-out.alur-checkout-1');
});

Route::get('/booking', function () {
    return view('layouts.booking');
});

Route::get('/contact', function () {
    return view('layouts.contact');
});

Route::get('/room', function () {
    return view('layouts.room');
});

Route::get('/service', function () {
    return view('layouts.service');
});

Route::get('/team', function () {
    return view('layouts.team');
});

Route::get('/tes', function () {
    return view('auth.registerdev');
});

// Route::group(['checkRole' => ['admin']], function () {
//     Route::get('home', 'HomeController@index');
//    });
Route::get('/admin', [DashboardController::class, 'index'])->middleware('checkRole:admin');

Route::get('peminjam', function () {
    return view('penjual');
})->middleware(['checkRole:peminjam,admin']);
Route::get('pembeli', function () {
    return view('pembeli');
})->middleware(['checkRole:pembeli,admin']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
