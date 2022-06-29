<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use PDF;

class PenjualanController extends Controller
{
    //digunakan untuk menampilkan data-data hasil transaksi
    public function index()
    {
        return view('penjualan_new.index');
    }

    public function data()
    {
        $penjualan = Penjualan::with('member')->orderBy('id_penjualan', 'desc')->get();

        return datatables()
            ->of($penjualan)
            ->addIndexColumn()
            ->addColumn('total_item', function ($penjualan) {
                return format_uang($penjualan->total_item);
            })
            ->addColumn('total_harga', function ($penjualan) {
                return 'Rp. '. format_uang($penjualan->total_harga);
            })
            ->addColumn('bayar', function ($penjualan) {
                return 'Rp. '. format_uang($penjualan->bayar);
            })
            ->addColumn('tanggal', function ($penjualan) {
                return tanggal_indonesia($penjualan->created_at, false);
            })
            ->editColumn('kasir', function ($penjualan) {
                return $penjualan->user->name ?? '';
            })
            ->addColumn('aksi', function ($penjualan) {
                return '
                <div class="btn-group">
                    <button onclick="showDetail(`'. route('penjualan.show', $penjualan->id_penjualan) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-eye"></i></button>
                    <button onclick="deleteData(`'. route('penjualan.destroy', $penjualan->id_penjualan) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $penjualan = new Penjualan();
        $penjualan->total_item = 0;
        $penjualan->total_harga = 0;
        $penjualan->bayar = 0;
        $penjualan->diterima = 0;
        $penjualan->id_user = auth()->id();
        $penjualan->save();

        session(['id_penjualan' => $penjualan -> id_penjualan]);
        return redirect()->route('transaksi.index');
    }

    public function store(Request $request)
    {
        $active = Penjualan::orderBy('id_penjualan')->first()->id_penjualan;
        $detail = PenjualanDetail::with('produk')->where('id_penjualan', $active)->get();
        //dd($detail);

        $total = 0;
        $total_item = 0;

        foreach ($detail as $item) {
            $total += $item->harga_jual * $item->jumlah;
            $total_item += $item->jumlah;          
        }
        //dd($total_item);
        $penjualan = Penjualan::where('id_penjualan', $active)->first();
        $penjualan->total_item = $total_item;
        $penjualan->total_harga = $total;
        $penjualan->bayar = $request->bayar;
        $penjualan->diterima = $request->bayar - $total;
        $penjualan->update();
        
        // $detail = PenjualanDetail::where('id_penjualan', $active)->first();
        // $id = PenjualanDetail::where('id_penjualan', $active)->first()->id_produk;
        // $jumlah = PenjualanDetail::where('id_penjualan', $active)->first()->jumlah;
        // foreach ($detail as $item) {
        //     $produk = Produk::where('id', $id);
        //     dd($produk);
        //     $produk->stok -= $jumlah;
        //     $produk->update();
        // }

        return redirect()->route('transaksi.selesai');
    }

    public function show($id)
    {
        $detail = PenjualanDetail::with('produk')->where('id_penjualan', $id)->get();

        return datatables()
            ->of($detail)
            ->addIndexColumn()
            ->addColumn('kode_produk', function ($detail) {
                return '<span class="label label-success">'. $detail->produk->kode_produk .'</span>';
            })
            ->addColumn('nama_produk', function ($detail) {
                return $detail->produk->nama_produk;
            })
            ->addColumn('harga_jual', function ($detail) {
                return 'Rp. '. format_uang($detail->harga_jual);
            })
            ->addColumn('jumlah', function ($detail) {
                return format_uang($detail->jumlah);
            })
            ->addColumn('subtotal', function ($detail) {
                return 'Rp. '. format_uang($detail->subtotal);
            })
            ->rawColumns(['kode_produk'])
            ->make(true);
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);
        $detail    = PenjualanDetail::where('id_penjualan', $penjualan->id_penjualan)->get();
        foreach ($detail as $item) {
            $produk = Produk::find($item->id_produk);
            if ($produk) {
                $produk->stok += $item->jumlah;
                $produk->update();
            }

            $item->delete();
        }

        $penjualan->delete();

        return response(null, 204);
    }

    public function selesai()
    {
        $detail = PenjualanDetail::with('produk')->first();
        return view('penjualan_new.selesai', compact('detail'))
            ->with('title', 'Selesai Transaksi');
    }

    public function cetak_pdf($id) 
    {
        $detail = PenjualanDetail::with('produk')->where('id_penjualan', $id)->get();
        $penjualan = Penjualan::find($id);
        $pdf = PDF::loadview('penjualan_new.nota', compact('detail', 'penjualan'));
        return $pdf->stream();
    }

    public function showTransaksi()
    {
        $penjualan = Penjualan::all();
        $paginate = Penjualan::paginate(5);
        return view('penjualan_new.daftar_transaksi', ['penjualan' => $penjualan, 'paginate'=>$paginate])
                ->with('title', 'Daftar Transaksi Penjualan');
    }
}
