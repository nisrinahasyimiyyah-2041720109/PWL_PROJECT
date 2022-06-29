<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\PenjualanNew;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanDetailController extends Controller
{
    public function index()
    {
        $produks = Produk::with('kategori')->get();
        $detail = PenjualanDetail::with('produk')->get();
        if ($id_penjualan = session('id_penjualan')) {
            $penjualan = Penjualan::find($id_penjualan);

            return view('penjualan_new.index', compact('produks','id_penjualan', 'penjualan', 'detail'))
                ->with('title', 'Buat Transaksi');
        } else {
            return redirect()->route('transaksi.baru');
        }

        // $produks = Produk::with('kategori')->get();
        // $penjualan = PenjualanDetail::with('produk')->get();
        // return view('penjualan_new.index', ['produks' => $produks, 'penjualan' => $penjualan])
        //     ->with('title', 'Buat Transaksi');
    }
    
    public function data($id)
    {
        $detail = PenjualanDetail::with('produk')
            ->where('id_penjualan', $id)
            ->get();

        $data = array();
        $total = 0;
        $total_item = 0;

        foreach ($detail as $item) {
            $row = array();
            $row['kode_produk'] = '<span class="label label-success">'. $item->produk['kode_produk'] .'</span';
            $row['nama_produk'] = $item->produk['nama_produk'];
            $row['harga_jual']  = 'Rp. '. format_uang($item->harga_jual);
            $row['jumlah']      = '<input type="number" class="form-control input-sm quantity" data-id="'. $item->id_penjualan_detail .'" value="'. $item->jumlah .'">';
            $row['subtotal']    = 'Rp. '. format_uang($item->subtotal);
            $row['aksi']        = '<div class="btn-group">
                                    <button onclick="deleteData(`'. route('transaksi.destroy', $item->id_penjualan_detail) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                                </div>';
            $data[] = $row;

            $total += $item->harga_jual * $item->jumlah;
            $total_item += $item->jumlah;
        }
        $data[] = [
            'kode_produk' => '
                <div class="total hide">'. $total .'</div>
                <div class="total_item hide">'. $total_item .'</div>',
            'nama_produk' => '',
            'harga_jual'  => '',
            'jumlah'      => '',
            'subtotal'    => '',
            'aksi'        => '',
        ];

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['aksi', 'kode_produk', 'jumlah'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $hargaJual = Produk::where('id', $request->pilih_produk)->first()->harga_jual;
        $jual = Penjualan::orderBy('id_penjualan')->first();

        $penjualan = new PenjualanDetail();
        $penjualan->id_penjualan = $jual->id_penjualan;
        $penjualan->id_produk = $request->pilih_produk;
        $penjualan->harga_jual = $hargaJual;
        $penjualan->jumlah = 1;
        $penjualan->subtotal = $hargaJual - (0 / 100 * $hargaJual);;
       
        $penjualan->save();

        //dd(Produk::where('id', $request->pilih_produk)->first()->harga_jual);
        
        session()->flash('message', 'Berhasil menambahkan produk ke list belanja');

        return redirect()->route('transaksi.index')
            ->with('success', 'Data Produk Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $jual = Produk::where('id', $request->pilih_produk)->first()->harga_jual;

        $detail = PenjualanDetail::find($id);
        $detail->jumlah = $request->jumlah;
        $detail->subtotal = $jual * $request->jumlah;
        $detail->update();
    }

    public function destroy($id)
    {
        $detail = PenjualanDetail::find($id);
        $detail->delete();

        return redirect()->route('transaksi.index');
    }  
}
