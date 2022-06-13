<?php

use Illuminate\Support\Facades\Route;

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

// ROUTE LANDING PAGE
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

Route::get('/admin-gedung', function () {
    return view('admin-gedung.index');
});

Route::get('/admin-gedung-form', function () {
    return view('admin-gedung.create');
});
// ./ROUTE ADMIN
