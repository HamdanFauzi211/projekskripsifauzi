<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemPerintahController;
use App\Http\Controllers\KategoriUmurController;
use App\Http\Controllers\AspekPerkembanganController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\JadwalPenilaianController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HasilPenilaianSiswaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;


// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
//     return view('dashboard');
// });

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware(['auth', 'Guru'])->group(function () {
    Route::get('guru/index', [AuthController::class, 'GuruIndex']);
    Route::get('guru/itemperintah',[ItemPerintahController::class, 'Show']);
    Route::get('guru/kategoriumur',[KategoriUmurController::class, 'Show']);
    Route::get('guru/aspekperkembangan',[AspekPerkembanganController::class, 'Show']);
    Route::get('guru/hasilpenilaiansiswa',[HasilPenilaianSiswaController::class, 'Show']);
    Route::get('guru/datasiswa',[SiswaController::class, 'show']);
    Route::resource('guru/jadwalpenilaian', JadwalPenilaianController::class);
    Route::get('guru/penilaian/screening/langkah1/{jadwal_penilaian_id}',[PenilaianController::class, 'indexLangkah1'])->name('penilaian.screening.langkah1.index');
    Route::post('guru/penilaian/screening/langkah1',[PenilaianController::class, 'storeLangkah1'])->name('penilaian.screening.langkah1.store');
    Route::get('guru/penilaian/screening/langkah2/{jadwal_penilaian_id}/{siswa_id}/{kategori_umur_id}',[PenilaianController::class, 'indexLangkah2'])->name('penilaian.screening.langkah2.index');
    Route::post('guru/penilaian/screening/langkah2',[PenilaianController::class, 'storeLangkah2'])->name('penilaian.screening.langkah2.store');
    Route::get('guru/penilaian/screening/hasil/{jadwal_penilaian_id}/{siswa_id}', [PenilaianController::class, 'hasilpenilaian'])->name('penilaian.screening.hasil.index');
    Route::get('guru/penilaian/screening/hasil/kesimpulan/{jadwal_penilaian_id}/{siswa_id}', [PenilaianController::class, 'hasilPenilaianAkhir'])->name('penilaian.screening.hasil.kesimpulan.index');


});


Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('admin/index', [AuthController::class, 'AdminIndex']);
    Route::get('admin/register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('admin/register/proses', [AdminController::class, 'prosesRegister'])->name('admin.register.proses');
    Route::get('/admin/datauser',[AdminController::class, 'user'])->name('account.user');
    Route::resource('admin/siswa', SiswaController::class);
    Route::resource('admin/jadwalpenilaian', AdminController::class);
});

Route::middleware(['auth', 'Pakar'])->group(function () {
    Route::get('pakar/index', [AuthController::class, 'PakarIndex']);
    });

Route::middleware(['auth', 'OrangTua'])->group(function () {
    Route::get('orangtua/index', [AuthController::class, 'OrangTuaIndex']);
 });





Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('latihan',[LatihanController::class, 'Show']);
Route::post('latihan/proces',[LatihanController::class, 'proses'])->name('latihan.proses');
