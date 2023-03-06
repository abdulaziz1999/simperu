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
    Route::put('resetPassword/{user:id}',
['uses' => 'App\Http\Controllers\UserController@resetPassword', 'as' => 'user.resetPassword']);
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
            ['nama' => 'Abdul Aziz', 'jobdesk' => 'Project Manager, Beckend Developer', 'link-profile-ig' => 'https://igdownloader.com/file?id=aHR0cHM6Ly9pbnN0YWdyYW0uZnNhbjEtMi5mbmEuZmJjZG4ubmV0L3YvdDUxLjI4ODUtMTkvNDYwOTQ1NDRfMjA4NzY1NDE2NzEzMDAwXzMyMjE1NzgzMDM1NjMzNjY0MDBfbi5qcGc/c3RwPWRzdC1qcGdfczMyMHgzMjAmX25jX2h0PWluc3RhZ3JhbS5mc2FuMS0yLmZuYS5mYmNkbi5uZXQmX25jX2NhdD0xMDgmX25jX29oYz1jUWN5Wi1pUHZCNEFYLVA1N1VoJmVkbT1BQmZkME1nQkFBQUEmY2NiPTctNSZvaD0wMF9BVC1PSXZ3b1RyVVFFY0lCaGplaTVqb0JvekMxM2NCVnJTVktjNkVwbG1XQkhnJm9lPTYyREYzRkQzJl9uY19zaWQ9N2JmZjgz'],
            ['nama' => 'Ahmad Hafid F', 'jobdesk' => 'UI/UX', 'link-profile-ig' => 'https://igdownloader.com/file?id=aHR0cHM6Ly9pbnN0YWdyYW0uZnphZzQtMS5mbmEuZmJjZG4ubmV0L3YvdDUxLjI4ODUtMTkvMjg1OTEzNTUxXzEzODIyNTU1MjU2MTM0MDRfMjkzNDE5MjIyOTQxMTczNTU2MV9uLmpwZz9zdHA9ZHN0LWpwZ19zMzIweDMyMCZfbmNfaHQ9aW5zdGFncmFtLmZ6YWc0LTEuZm5hLmZiY2RuLm5ldCZfbmNfY2F0PTEwOCZfbmNfb2hjPW83dWRDaFdnOUVrQVg4bDBJelImZWRtPUFBV3ZuUlFCQUFBQSZjY2I9Ny01Jm9oPTAwX0FUOHZ1S0w5Umx5VHJoZS16RExvV1hOM3NEWmRYbjBQNURhTy1OVWFLNGlGN0Emb2U9NjJFMDU2NTkmX25jX3NpZD1lNzczOGM='],
            ['nama' => 'Ayu Widya N', 'jobdesk' => 'Analisis Bisnis Proses', 'link-profile-ig' => 'https://igdownloader.com/file?id=aHR0cHM6Ly9pbnN0YWdyYW0uZmJnYTMtMS5mbmEuZmJjZG4ubmV0L3YvdDUxLjI4ODUtMTkvMjgzNTE2MTYxXzUxOTg1NDQ5OTY5MzQwNl8yNTE0NTE1MTg1NzQ0MjE0NjA3X24uanBnP3N0cD1kc3QtanBnX3MzMjB4MzIwJl9uY19odD1pbnN0YWdyYW0uZmJnYTMtMS5mbmEuZmJjZG4ubmV0Jl9uY19jYXQ9MTEwJl9uY19vaGM9anhqV2hBanJ1ZGdBWDlkVnlvbiZlZG09QUVoTWVzd0JBQUFBJmNjYj03LTUmb2g9MDBfQVQ4eUFGQzBlb1h5ckt0eVhaZVJWbGR3cTFrWFNPXzg2c2F4WmNZaXJINy1UZyZvZT02MkRGMThEMiZfbmNfc2lkPTdmYmE0Nw=='],
            ['nama' => 'Derren Dwi S', 'jobdesk' => 'Dokumentasi & PPT', 'link-profile-ig' => 'https://igdownloader.com/file?id=aHR0cHM6Ly9zY29udGVudC1zaW42LTMuY2RuaW5zdGFncmFtLmNvbS92L3Q1MS4yODg1LTE5LzI3NDM4NTgzN18yNTM0NzY2MzM2NDE3NThfNzk3MDQ1NTI5MDQ3MTQ0MjUyMl9uLmpwZz9zdHA9ZHN0LWpwZ19zMzIweDMyMCZfbmNfaHQ9c2NvbnRlbnQtc2luNi0zLmNkbmluc3RhZ3JhbS5jb20mX25jX2NhdD0xMTAmX25jX29oYz15Zm02ejdNUUMtY0FYOEt3TkJpJmVkbT1BQVd2blJRQkFBQUEmY2NiPTctNSZvaD0wMF9BVC0wY1lhX19IR2kyNC1ERTdJMDh6S0lpUGxZeVQ3b0wtbHNORkFiY19UWVl3Jm9lPTYyREY3OEQyJl9uY19zaWQ9ZTc3Mzhj'],
            ['nama' => 'Ficri Hanip', 'jobdesk' => 'Frontend Developer', 'link-profile-ig' => 'https://igdownloader.com/file?id=aHR0cHM6Ly9pbnN0YWdyYW0uZnFsczEtMS5mbmEuZmJjZG4ubmV0L3YvdDUxLjI4ODUtMTkvMjkwMjQ3NTE1XzE4NjYyNzkzMzAyMzY1NjJfNDU5MjQ1NTgzOTU0OTQ3OTg5MV9uLmpwZz9zdHA9ZHN0LWpwZ19zMzIweDMyMCZfbmNfaHQ9aW5zdGFncmFtLmZxbHMxLTEuZm5hLmZiY2RuLm5ldCZfbmNfY2F0PTEwNiZfbmNfb2hjPTl1M2RDVDljX3hVQVg4d0lJVDgmZWRtPUFCZmQwTWdCQUFBQSZjY2I9Ny01Jm9oPTAwX0FUOGpUVzNhUGlnb212R1JzdzAzejdqRlBla3NCdWxMWnVPTEdBampRUTNtZVEmb2U9NjJERjBGMkYmX25jX3NpZD03YmZmODM=']
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
