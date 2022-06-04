<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data pelanggan menggunakan pagination
        $pelanggan = Pelanggan::paginate(5); //mendapatkan semua isi tabel dengan paginasi 5 data per halaman
        return view('data_pelanggan.index', ['blog' => $pelanggan])
                ->with('title', 'Daftar Pelanggan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_pelanggan.create')
            ->with('title', 'Tambah Data Pelanggan');
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
            'kode_pelanggan' => 'required',
            'nama' => 'required',           
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_telepon' => 'required',
        ]);

        Pelanggan::create([
            'kode_pelanggan' => $request->kode_pelanggan,
            'nama' => $request->nama,           
            'alamat' => $request->alamat,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'nomor_telepon' => $request->nomor_telepon,
        ]);
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pelanggan.index')
            ->with('success', 'Data Pelanggan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan id pelanggan
        $pelanggan = Pelanggan::find($id);
        return view('data_pelanggan.detail', compact('pelanggan'))
            ->with('title', 'Tampil Detail Pelanggan');
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
        $pelanggan = Pelanggan::find($id);
        return view('data_pelanggan.edit', compact('pelanggan'))
            ->with('title', 'Edit Data Pelanggan');
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
            'kode_pelanggan' => 'required',
            'nama' => 'required',           
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_telepon' => 'required',
        ]);

        $pelanggan = Pelanggan::find($id);
        $pelanggan->kode_pelanggan = $request->get('kode_pelanggan');
        $pelanggan->nama = $request->get('nama');        
        $pelanggan->alamat = $request->get('alamat');
        $pelanggan->jenis_kelamin = $request->get('jenis_kelamin');
        $pelanggan->nomor_telepon = $request->get('nomor_telepon');

        $pelanggan->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('pelanggan.index')
            ->with('success', 'Data Pelanggan Berhasil Diupdate');
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
        Pelanggan::find($id)->delete();
        return redirect()->route('pelanggan.index')
            -> with('success', 'Data Pelanggan Berhasil Dihapus');
    }
}
