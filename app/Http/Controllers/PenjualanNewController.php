<?php

namespace App\Http\Controllers;

use App\Models\PenjualanNew;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::with('kategori')->get();
        $penjualan = PenjualanNew::with('produk')->get();
        return view('penjualan_new.index', ['produks' => $produks, 'penjualan' => $penjualan])
                ->with('title', 'Buat Transaksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public $produk;

    public function store(Request $request)
    {
        /*
        $request->validate([
            'id_produk' => 'required|unique:penjualans',
        ]);*/

        $jual = Produk::where('id', $request->pilih_produk)->first()->harga_jual;

        $penjualan = new PenjualanNew;
        $penjualan->total_item = 1;
        $penjualan->total_harga = $jual;
        $penjualan->diskon = 0;
        $penjualan->bayar = 0;
        $penjualan->diterima = 0;
        $penjualan->id_user = auth()->id();
        $penjualan->id_produk = $request->pilih_produk;
        $penjualan->save();

        //dd(Produk::where('id', $request->pilih_produk)->first()->harga_jual);
        
        session()->flash('message', 'Berhasil menambahkan produk ke list belanja');

        return redirect()->route('transaksi.index')
            ->with('success', 'Data Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penjualan = PenjualanNew::with('produk')->where('id_penjualan', $id)->first();
        $penjualan->bayar = $request->get('bayar');
        $penjualan->diterima = $penjualan->total_harga - (($penjualan->total_harga) - $request->bayar);
        $penjualan->update(); 
        
        $detail = PenjualanNew::where('id_penjualan', $penjualan->id_penjualan)->first();
        foreach ($detail as $item) {
            $produk = Produk::find($item->id);
            $produk->stok -= $item->total_item;
            $produk->update();
        }
        //dd($request->$id);
        session()->flash('message', 'Total item berhasil di tambah');

        return redirect()->route('transaksi.index')
            ->with('success', 'Total item berhasil di tambah');
    }

    public function pembaruan(Request $request, $id)
    {
        $penjualan = PenjualanNew::with('produk')->where('id', $id)->first();
        $penjualan->update([
            $penjualan->total_item = $request->$penjualan->total_item+1,
            $penjualan->total_harga = $request->$penjualan->total_harga*($penjualan->total_item+1)
        ]);
        //$penjualan->save();
        dd($request->$id);

        session()->flash('message', 'Total item berhasil di tambah');

        return redirect()->route('transaksi.index')
            ->with('success', 'Total item berhasil di tambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
