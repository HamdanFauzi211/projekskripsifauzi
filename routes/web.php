<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemPerintahController;
use App\Http\Controllers\KategoriUmurController;
use App\Http\Controllers\AspekPerkembanganController;
use App\Http\Controllers\LatihanController;

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
Route::post('latihan/proces',[LatihanController::class, 'proses'])->name('latihan.proses');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
