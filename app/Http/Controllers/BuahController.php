<?php

namespace App\Http\Controllers;

use App\Models\Buah;
use Illuminate\Http\Request;

class BuahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data buah menggunakan pagination
        $buahs = Buah::paginate(5); //mendapatkan semua isi tabel dengan paginasi 5 buah per halaman
        return view('data_buah.index', ['blog' => $buahs])
                ->with('title', 'Daftar Buah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_buah.create')
            ->with('title', 'Tambah Data Buah');
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

        Buah::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga'=> $request->harga,
            'stok' => $request->stok,
            'gambar' => $nama_gambar,
        ]);
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('buah.index')
            ->with('success', 'Data Buah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan id buah
        $buah = Buah::find($id);
        return view('data_buah.detail', compact('buah'))
            ->with('title', 'Tampil Detail Buah');
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
        $buah = Buah::find($id);
        return view('data_buah.edit', compact('buah'))
            ->with('title', 'Edit Data Buah');
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

        $buah = Buah::find($id);
        $buah->nama = $request->get('nama');
        $buah->kategori = $request->get('kategori');
        $buah->harga = $request->get('harga');
        $buah->stok = $request->get('stok');

        if ($buah->gambar && file_exists(storage_path('app/public/' . $buah->gambar))) {
            \Storage::delete('public/', $buah->gambar);
        }

        $nama_gambar = $request->file('gambar')->store('gambar', 'public');
        $buah->gambar = $nama_gambar;

        $buah->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('buah.index')
            ->with('success', 'Data Buah Berhasil Diupdate');
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
        Buah::find($id)->delete();
        return redirect()->route('buah.index')
            -> with('success', 'Data Buah Berhasil Dihapus');
    }
}
