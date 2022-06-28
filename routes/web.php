<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\PenjualanNewController;
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

Route::post('/transaksi/simpan', [PenjualanController::class, 'store'])->name('transaksi.simpan');
Route::get('/transaksi/selesai', [PenjualanController::class, 'selesai'])->name('transaksi.selesai');

Route::get('/transaksi/{id}/data', [PenjualanDetailController::class, 'data'])->name('transaksi.data');
Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('transaksi.load_form');
Route::get('/transaksi/baru', [PenjualanController::class, 'create'])->name('transaksi.baru');
Route::resource('transaksi', PenjualanDetailController::class);

//Route::post('transaksi/{id}', [PenjualanNewController::class, 'pembaruan'])->name('transaksi.pembaruan');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
Route::get('/penjualan/data', [PenjualanController::class, 'data'])->name('penjualan.data');
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
*/

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
