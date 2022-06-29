<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriRuanganController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LandingGedungController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ListRuanganController;
use App\Http\Controllers\DashboardController;
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

//landing page root
Route::get('/', [LandingPageController::class, 'index_landing_page']);
Route::post('/search', [LandingPageController::class, 'search']);

Route::resource('list-gedung', LandingGedungController::class);
// Route::get('/list-gedung', [LandingGedungController::class, 'index']);
// Route::get('/details-gedung/{id}', [LandingGedungController::class, 'show']);


//ficri
Route::get('/list-ruangan', [ListRuanganController::class, 'list_ruangan']);
Route::get('/list-ruangan/detail/{ruangan:id}', [ListRuanganController::class, 'detail_ruangan']);
Route::post('/list-ruangan/{ruangan:id}/available_date/{id}', [ListRuanganController::class, 'available_date']);
Route::get('/list-ruangan/{ruangan:id}/available_date/{id}', [ListRuanganController::class, 'available_date']);
Route::any('/checkout/{ruangan:id}', [ListRuanganController::class, 'checkoutDetail']);
// Route::post('/checkout/{ruangan:id}/{peminjaman}/{dwp}/{dwp_plus}', [ListRuanganController::class, 'onCheckout']);
// Route::post('/checkout/{ruangan:id}', [ListRuanganController::class, 'checkout']);

// Route::get('/detail-ruangan/{id}', function () {
//     return view('mansion.page3');
// });

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
