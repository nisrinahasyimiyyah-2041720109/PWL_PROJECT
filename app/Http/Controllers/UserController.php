<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data user menggunakan pagination
        $user = User::paginate(5); //mendapatkan semua isi tabel dengan paginasi 5 data per halaman
        return view('data_user.index', ['blog' => $user])
                ->with('title', 'Daftar User');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_user.create')
            ->with('title', 'Tambah Data User');
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
            'name' => 'required',
            'email' => 'required',           
            'password' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_telepon' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,   
            'password' => $request->password,        
            'alamat' => $request->alamat,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'nomor_telepon' => $request->nomor_telepon,
            'role' => $request->role,
        ]);
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('user.index')
            ->with('success', 'Data User Berhasil Ditambahkan');
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
        $user = User::find($id);
        return view('data_user.detail', compact('user'))
            ->with('title', 'Tampil Detail User');
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
        $user = User::find($id);
        return view('data_user.edit', compact('user'))
            ->with('title', 'Edit Data User');
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
            'name' => 'required',
            'email' => 'required',           
            'password' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_telepon' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');        
        $user->alamat = $request->get('alamat');
        $user->jenis_kelamin = $request->get('jenis_kelamin');
        $user->nomor_telepon = $request->get('nomor_telepon');
        $user->role = $request->get('role');

        $user->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('user.index')
            ->with('success', 'Data User Berhasil Diupdate');
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
        User::find($id)->delete();
        return redirect()->route('user.index')
            -> with('success', 'Data User Berhasil Dihapus');
    }
}
