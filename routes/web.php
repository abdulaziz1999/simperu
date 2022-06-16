<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriRuanganController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SimperuController;
use Illuminate\Support\Facades\Auth;
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

// Route::resource('simperu', SimperuController::class);
Route::resource('gedung', GedungController::class);
Route::resource('fasilitas', FasilitasController::class);
Route::resource('kategoriRuangan', KategoriRuanganController::class);
Route::resource('ruangan', RuanganController::class);

// ROUTE ADMIN
Route::get('/admin', function () {
    return view('admin.index');
});
// ./ROUTE ADMIN

// Route::get('/', 'SimperuController@index')->name('index');
Route::get('/', 'App\Http\Controllers\SimperuController@index');
Route::get('/viewGedung', 'App\Http\Controllers\SimperuController@gedung');


// Auth::routes();
// Route::get('/beranda', 'SimperuController@index')->name('index');

Route::get('/dash', function () {
    //return view('welcome');
    return view('layouts_2.home');
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
Route::get('/admin', function () {
    return view('admin.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
