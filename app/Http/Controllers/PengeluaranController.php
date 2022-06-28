<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data Pegawai menggunakan pagination
        $pengeluarans = Pengeluaran::paginate(3); 
        return view('data_pengeluaran.index', ['blog' => $pengeluarans])
                ->with('title', 'Daftar Pegawai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_pengeluaran.create')
            ->with('title', 'Tambah Data Pengeluaran');
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
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'nominal' => 'required',
        ]);


        Pengeluaran::create([
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'nominal'=> $request->nominal,
            
        ]);
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pengeluaran.index')
            ->with('success', 'Data Pengeluaran Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan id pegawai
        $pengeluaran = Pengeluaran::find($id);
        return view('data_pengeluaran.detail', compact('pengeluaran'))
            ->with('title', 'Tampil Detail Pengeluaran');
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
        $pengeluaran = Pengeluaran::find($id);
        return view('data_pengeluaran.edit', compact('pengeluaran'))
            ->with('title', 'Edit Data Pengeluaran');
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
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'nominal' => 'required',
        ]);

        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->tanggal = $request->get('tanggal');
        $pengeluaran->deskripsi = $request->get('deskripsi');
        $pengeluaran->nominal = $request->get('nominal');

        $pengeluaran->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('pengeluaran.index')
            ->with('success', 'Data Pengeluaran Berhasil Diupdate');
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
        Pengeluaran::find($id)->delete();
        return redirect()->route('pengeluaran.index')
            -> with('success', 'Data Pengeluaran Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $pengeluaran = Pengeluaran::where('deskripsi', 'like', "%" . $keyword . "%")->paginate(3);
        return view('data_pengeluaran.index', compact('pengeluaran'));
    }      

}