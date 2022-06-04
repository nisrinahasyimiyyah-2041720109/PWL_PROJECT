<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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

Route::resource('user', UserController:: class);

Route::resource('pegawai', PegawaiController:: class);

Route::resource('supplier', supplierController:: class);

