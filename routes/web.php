<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PromosiController;
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
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/setting/{id}', [AdminController::class, 'show']);
    Route::post('/setting', [AuthController::class, 'password']);
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/edtProfil/{id}', [AdminController::class, 'edit']);
    Route::post('/edtProfil', [AdminController::class, 'update'])->name('edtProfil');
    Route::get('/tentang', [ProfilController::class, 'index']);
    Route::get('/promosi', [PromosiController::class, 'index']);
    Route::get('/promosi.tbh', [PromosiController::class, 'create']);
    Route::post('/promosi.tbh', [PromosiController::class, 'store'])->name('tbhPromosi');
    Route::get('/promosi.edt/{id}', [PromosiController::class, 'edit']);
    Route::post('/promosi.edt', [PromosiController::class, 'update'])->name('edtPromosi');
    Route::get('/promosi.del/{id}', [PromosiController::class, 'destroy']);
    Route::get('/pelayanan', [PelayananController::class, 'index']);
    Route::get('/pelayanan.tbh', [PelayananController::class, 'create']);
    Route::post('/pelayanan.tbh', [PelayananController::class, 'store'])->name('tbhPelayanan');
    Route::get('/pelayanan.edt/{id}', [PelayananController::class, 'edit']);
    Route::post('/pelayanan.edt', [PelayananController::class, 'update'])->name('edtPelayanan');
    Route::get('/pelayanan.del/{id}', [PelayananController::class, 'destroy']);
    Route::get('/pesanan', [PesananController::class, 'index']);
    Route::get('/psdPesanan', [PesananController::class, 'psdPesanan']);
    Route::get('/prosedur.tbh', [PesananController::class, 'create']);
    Route::post('/prosedur.tbh', [PesananController::class, 'store'])->name('tbhProsedur');
    Route::get('/prosedur.edt/{id}', [PesananController::class, 'edit']);
    Route::post('/prosedur.edt', [PesananController::class, 'update'])->name('edtProsedur');
    Route::get('/prosedur.del/{id}', [PesananController::class, 'destroy']);
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/profil', [HomeController::class, 'profil']);
Route::get('/layanan', [HomeController::class, 'layanan']);
Route::get('/prosedur', [HomeController::class, 'prosedur']);
Route::get('/kontak', [HomeController::class, 'kontak']);
