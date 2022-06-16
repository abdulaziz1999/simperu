<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriRuanganController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\RuanganController;
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

Route::resource('kategoriRuangan', KategoriRuanganController::class);
Route::resource('gedung', GedungController::class);
Route::resource('fasilitas', FasilitasController::class);
Route::resource('ruangan', RuanganController::class);

// ROUTE ADMIN
Route::get('/admin', function () {
    return view('admin.index');
});
// ./ROUTE ADMIN


Route::get('/dashboard', function () {
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