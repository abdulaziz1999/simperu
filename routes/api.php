<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//ruangan
Route::get('/ruangan', [ApiController::class, 'ruangan']);
Route::get('/ruangan/{id}', [ApiController::class, 'ruanganById']);
Route::post('/ruangan', [ApiController::class, 'ruanganCreate']);
Route::put('/ruangan/{id}', [ApiController::class, 'ruanganUpdate']);
Route::delete('/ruangan/{id}', [ApiController::class, 'ruanganDelete']);

//gedung
Route::get('/gedung', [ApiController::class, 'gedung']);
Route::get('/gedung/{id}', [ApiController::class, 'gedungById']);
Route::post('/gedung', [ApiController::class, 'gedungCreate']);
Route::put('/gedung/{id}', [ApiController::class, 'gedungUpdate']);
Route::delete('/gedung/{id}', [ApiController::class, 'gedungDelete']);

//kategori ruangan
Route::get('/kategori-ruangan', [ApiController::class, 'kategoriRuangan']);
Route::get('/kategori-ruangan/{id}', [ApiController::class, 'kategoriRuanganById']);
Route::post('/kategori-ruangan', [ApiController::class, 'kategoriRuanganCreate']);
Route::put('/kategori-ruangan/{id}', [ApiController::class, 'kategoriRuanganUpdate']);
Route::delete('/kategori-ruangan/{id}', [ApiController::class, 'kategoriRuanganDelete']);

//fasilitas
Route::get('/fasilitas', [ApiController::class, 'fasilitas']);
Route::get('/fasilitas/{id}', [ApiController::class, 'fasilitasById']);
Route::post('/fasilitas', [ApiController::class, 'fasilitasCreate']);
Route::put('/fasilitas/{id}', [ApiController::class, 'fasilitasUpdate']);
Route::delete('/fasilitas/{id}', [ApiController::class, 'fasilitasDelete']);

//user
Route::get('/user', [ApiController::class, 'user']);
Route::get('/user/{id}', [ApiController::class, 'userById']);

