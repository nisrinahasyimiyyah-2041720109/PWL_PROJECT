<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data supplier menggunakan pagination
        $suppliers = Supplier::paginate(5); //mendapatkan semua isi tabel dengan paginasi 5 buah per halaman
        return view('data_supplier.index', ['blog' => $suppliers])
                ->with('title', 'Daftar Supplier');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_supplier.create')
            ->with('title', 'Tambah Data Supplier');
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
            'nomor_telepon' => 'required',
        ]);


        Supplier::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('supplier.index')
            ->with('success', 'Data Supplier Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan id supplier
        $supplier = Supplier::find($id);
        return view('data_supplier.detail', compact('supplier'))
            ->with('title', 'Tampil Detail Supplier');
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
        $supplier = Supplier::find($id);
        return view('data_supplier.edit', compact('supplier'))
            ->with('title', 'Edit Data Supplier');
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
            'nomor_telepon' => 'required',
        ]);

        $supplier = Supplier::find($id);
        $supplier->nama = $request->get('nama');
        $supplier->alamat = $request->get('alamat');
        $supplier->nomor_telepon = $request->get('nomor_telepon');

        $supplier->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('supplier.index')
            ->with('success', 'Data Supplier Berhasil Diupdate');
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
        Supplier::find($id)->delete();
        return redirect()->route('supplier.index')
            -> with('success', 'Data Supplier Berhasil Dihapus');
    }
}