<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data buah menggunakan pagination
        $produk = Produk::paginate(5); //mendapatkan semua isi tabel dengan paginasi 5 buah per halaman
        return view('data_produk.index', ['blog' => $produk])
                ->with('title', 'Daftar Buah dan Sayur');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_produk.create')
            ->with('title', 'Tambah Data Buah dan Sayur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',           
            'kategori' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'gambar' => 'required',
        ]);

        if ($request->file('gambar')) {
           $nama_gambar = $request->file('gambar')->store('gambar', 'public');
        }

        Produk::create([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,           
            'kategori' => $request->kategori,
            'harga_beli'=> $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'gambar' => $nama_gambar,
        ]);
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('produk.index')
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
        //menampilkan detail data dengan menemukan berdasarkan id produk
        $produk = Produk::find($id);
        return view('data_produk.detail', compact('produk'))
            ->with('title', 'Tampil Detail Produk');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan id untuk diedit
        $produk = Produk::find($id);
        return view('data_produk.edit', compact('produk'))
            ->with('title', 'Edit Data Produk');
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
        //melakukan validasi data
        $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',         
            'kategori' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'gambar' => 'required',
        ]);

        $produk = Produk::find($id);
        $produk->kode_produk = $request->get('kode_produk');
        $produk->nama_produk = $request->get('nama_produk');        
        $produk->kategori = $request->get('kategori');
        $produk->harga_beli = $request->get('harga_beli');
        $produk->harga_jual = $request->get('harga_jual');
        $produk->stok = $request->get('stok');

        if ($produk->gambar && file_exists(storage_path('app/public/' . $produk->gambar))) {
            \Storage::delete('public/', $produk->gambar);
        }

        $nama_gambar = $request->file('gambar')->store('gambar', 'public');
        $produk->gambar = $nama_gambar;

        $produk->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('produk.index')
            ->with('success', 'Data Produk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        Produk::find($id)->delete();
        return redirect()->route('produk.index')
            -> with('success', 'Data Produk Berhasil Dihapus');
    }
}
