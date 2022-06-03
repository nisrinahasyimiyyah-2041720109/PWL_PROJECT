<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data Pegawaib menggunakan pagination
        $pegawais = Pegawai::paginate(3); //mendapatkan semua isi tabel dengan paginasi 5 buah per halaman
        return view('data_pegawai.index', ['blog' => $pegawais])
                ->with('title', 'Daftar Pegawai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_pegawai.create')
            ->with('title', 'Tambah Data Pegawai');
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
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_telepon' => 'required',
            'jabatan' => 'required',
        ]);


        Pegawai::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'nomor_telepon' => $request->nomor_telepon,
            'jabatan' => $request->jabatan,
        ]);
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pegawai.index')
            ->with('success', 'Data Pegawai Berhasil Ditambahkan');
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
        $pegawai = Pegawai::find($id);
        return view('data_pegawai.detail', compact('pegawai'))
            ->with('title', 'Tampil Detail Pegawai');
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
        $pegawai = Pegawai::find($id);
        return view('data_pegawai.edit', compact('pegawai'))
            ->with('title', 'Edit Data Pegawai');
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
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_telepon' => 'required',
            'jabatan' => 'required',
        ]);

        $pegawai = Pegawai::find($id);
        $pegawai->nama = $request->get('nama');
        $pegawai->alamat = $request->get('alamat');
        $pegawai->jenis_kelamin = $request->get('jenis_kelamin');
        $pegawai->nomor_telepon = $request->get('nomor_telepon');
        $pegawai->jabatan = $request->get('jabatan');

        $pegawai->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('pegawai.index')
            ->with('success', 'Data Pegawai Berhasil Diupdate');
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
        Pegawai::find($id)->delete();
        return redirect()->route('pegawai.index')
            -> with('success', 'Data Pegawai Berhasil Dihapus');
    }
}

