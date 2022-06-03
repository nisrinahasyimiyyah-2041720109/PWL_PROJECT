<?php

use App\Http\Controllers\BuahController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SayurController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [MainController:: class, 'home']);

Route::resource('produk', ProdukController:: class);

Route::get('/pelanggan', [MainController:: class, 'index']);

Route::resource('pegawai', PegawaiController:: class);

Route::get('/supplier', [MainController:: class, 'supplier']);
