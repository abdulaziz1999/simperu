<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GedungController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('gedung', GedungController::class);

Route::get('/dashboard', function () {
    //return view('welcome');
    return view('layouts_2.home');
});

Route::get('/', function () {
    //return view('welcome');
    return view('welcome');
});

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/about', function () {
    return view('layouts.about');
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

Route::get('/admin-gedung-form', function () {
    return view('admin-gedung.create');
});
// ./ROUTE ADMIN
