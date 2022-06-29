<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriRuanganController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LandingGedungController;
use App\Http\Controllers\MansionController;
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

//landing page root
Route::get('/', [LandingPageController::class, 'index_landing_page']);
Route::post('/search', [LandingPageController::class, 'search']);

Route::resource('list-gedung', LandingGedungController::class);
// Route::get('/list-gedung', [LandingGedungController::class, 'index']);
// Route::get('/details-gedung/{id}', [LandingGedungController::class, 'show']);


//ficri
Route::get('/list-ruangan', [ListRuanganController::class, 'list_ruangan']);
Route::get('/list-ruangan/detail/{ruangan:id}', [ListRuanganController::class, 'detail_ruangan']);
Route::get('/list-ruangan/{ruangan:id}/available_date/{id}', [ListRuanganController::class, 'available_date']);
Route::post('/list-ruangan/{ruangan:id}/available_date/{id}', [ListRuanganController::class, 'available_date']);
Route::post('/checkout/{ruangan:id}', [ListRuanganController::class, 'checkout']);

Route::get('/detail-ruangan/{id}', function () {
    return view('mansion.page3');
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

Route::get('/testimonial', function () {
    return view('layouts.testimonial');
});
// ./ROUTE LANDING PAGE

// ROUTE ADMIN
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/admin', [DashboardController::class, 'index']);
});
