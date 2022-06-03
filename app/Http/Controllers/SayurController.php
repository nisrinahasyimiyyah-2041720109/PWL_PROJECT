<?php

namespace App\Http\Controllers;

use App\Models\Sayur;
use Illuminate\Http\Request;

class SayurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data sayur menggunakan pagination
        $sayurs = Sayur::paginate(5); //mendapatkan semua isi tabel dengan paginasi 5 sayur per halaman
        return view('data_sayur.index', ['blog' => $sayurs])
                ->with('title', 'Daftar Sayur');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_sayur.create')
            ->with('title', 'Tambah Data Sayur');
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
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required',
        ]);

        if ($request->file('gambar')) {
           $nama_gambar = $request->file('gambar')->store('gambar', 'public');
        }

        Sayur::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga'=> $request->harga,
            'stok' => $request->stok,
            'gambar' => $nama_gambar,
        ]);
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('sayur.index')
            ->with('success', 'Data Sayur Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan id sayur
        $sayur = Sayur::find($id);
        return view('data_sayur.detail', compact('sayur'))
            ->with('title', 'Tampil Detail Sayur');
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
        $sayur = Sayur::find($id);
        return view('data_sayur.edit', compact('sayur'))
            ->with('title', 'Edit Data Sayur');
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
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required',
        ]);

        $sayur = Sayur::find($id);
        $sayur->nama = $request->get('nama');
        $sayur->kategori = $request->get('kategori');
        $sayur->harga = $request->get('harga');
        $sayur->stok = $request->get('stok');

        if ($sayur->gambar && file_exists(storage_path('app/public/' . $sayur->gambar))) {
            \Storage::delete('public/', $sayur->gambar);
        }

        $nama_gambar = $request->file('gambar')->store('gambar', 'public');
        $sayur->gambar = $nama_gambar;

        $sayur->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('sayur.index')
            ->with('success', 'Data Sayur Berhasil Diupdate');
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
        Sayur::find($id)->delete();
        return redirect()->route('sayur.index')
            -> with('success', 'Data Sayur Berhasil Dihapus');
    }
}
