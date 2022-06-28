<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PembelianDetailController;



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
Route::get('/', function() {
    return redirect('/login');
});

Route::resource('produk', ProdukController:: class);

Route::resource('user', UserController:: class);

Route::resource('pegawai', PegawaiController:: class);
Route::get('/search', [PegawaiController::class, 'search'])->name('search');

Route::resource('supplier', supplierController:: class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');

Route::resource('pengeluaran', PengeluaranController:: class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/data_pembelian/data', [PembelianController::class, 'data'])->name('data_pembelian.data');
        Route::get('/data_pembelian/{id}/create', [PembelianController::class, 'create'])->name('data_pembelian.create');
        Route::resource('/data_pembelian', PembelianController::class)
            ->except('create');

        Route::get('/data_pembelian_detail/{id}/data', [PembelianDetailController::class, 'data'])->name('data_pembelian_detail.data');
        Route::get('/data_pembelian_detail/loadform/{diskon}/{total}', [PembelianDetailController::class, 'loadForm'])->name('data_pembelian_detail.load_form');
        Route::resource('/data_pembelian_detail', PembelianDetailController::class)
            ->except('create', 'show', 'edit');