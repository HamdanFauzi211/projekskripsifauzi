<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemPerintahController;
use App\Http\Controllers\KategoriUmurController;
use App\Http\Controllers\AspekPerkembanganController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\JadwalPenilaianController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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



Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/create', function () {
    return view('formtambahdata');
});




Route::get('itemperintah',[ItemPerintahController::class, 'Show']);
Route::get('kategoriumur',[KategoriUmurController::class, 'Show']);
Route::get('aspekperkembangan',[AspekPerkembanganController::class, 'Show']);
Route::get('latihan',[LatihanController::class, 'Show']);
Route::post('latihan/proces',[LatihanController::class, 'proses'])->name('latihan.proses');
Route::resource('jadwalpenilaian', JadwalPenilaianController::class);
Route::get('penilaian/screening/langkah1/{jadwal_penilaian_id}',[PenilaianController::class, 'indexLangkah1'])->name('penilaian.screening.langkah1.index');
Route::post('penilaian/screening/langkah1',[PenilaianController::class, 'storeLangkah1'])->name('penilaian.screening.langkah1.store');
Route::get('penilaian/screening/langkah2/{jadwal_penilaian_id}/{siswa_id}/{kategori_umur_id}',[PenilaianController::class, 'indexLangkah2'])->name('penilaian.screening.langkah2.index');
Route::post('penilaian/screening/langkah2',[PenilaianController::class, 'storeLangkah2'])->name('penilaian.screening.langkah2.store');
Route::get('penilaian/screening/hasil/{jadwal_penilaian_id}', [PenilaianController::class, 'hasilpenilaian'])->name('penilaian.screening.hasil.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
