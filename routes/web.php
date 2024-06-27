<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MessageController;

Route::get('login', [AuthController::class, 'formLogin'])->name('auth.form-login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'store'])->name('register.store');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::view('/', 'dashboard-admin');
    Route::resource('paket', PaketController::class);
    Route::resource('member', MemberController::class);
    Route::get('member-cetak', [MemberController::class, 'cetak'])->name('member-cetak');
    Route::resource('transaksi', TransaksiController::class);
    Route::put('transaksi/{transaksi}/save-instruktur', [TransaksiController::class, 'saveInstruktur'])->name('transaksi.save-instruktur');
    Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('jadwal/{transaksi}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('jadwal/{transaksi}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::get('jadwal-cetak', [JadwalController::class, 'cetak'])->name('jadwal-cetak');
    Route::resource('instruktur', InstrukturController::class);
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');
});

Route::group(['middleware' => ["auth"]], function () {
    Route::get('/boking-paket/{paket}', [HomeController::class, 'bokingPaket'])->name('boking-paket');
    Route::post('/boking-paket/{paket}/store', [HomeController::class, 'storeBoking'])->name('boking-paket.store');
    Route::get('/my-paket', [HomeController::class, 'myPaket'])->name('my-paket');
    Route::get('/my-paket/{transaksi}', [HomeController::class, 'detailMyPaket'])->name('my-paket.detail');
    Route::get('/my-paket/{transaksi}/cetak', [HomeController::class, 'cetakInvoice'])->name('my-paket.cetak');
    Route::post('/my-paket/{transaksi}', [HomeController::class, 'uploadBuktiBayar'])->name('my-paket.upload-bukti');
    Route::get('/my-profile', [HomeController::class, 'myProfile'])->name('my-profile');
    Route::put('/my-profile/{member}', [HomeController::class, 'updateProfile'])->name('my-profile.update');
    Route::put('/my-profile-reset', [HomeController::class, 'reset'])->name('my-profile.reset');
});

Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/daftar-paket', [HomeController::class, 'paket'])->name('daftar-paket');
Route::get('/daftar-paket/{paket}', [HomeController::class, 'detailPaket'])->name('detail-paket');
Route::get('/daftar-paket/{paket}', [HomeController::class, 'detailPaket'])->name('detail-paket');
Route::resource('/contasct-us', MessageController::class);
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/faqs', [HomeController::class, 'faq'])->name('faqs');
