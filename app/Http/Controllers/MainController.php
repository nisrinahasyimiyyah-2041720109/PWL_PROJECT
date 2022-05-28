<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('data.home')
                    ->with('title', 'Home');
    }

    public function barang()
    {
        return view('data.barang')
                    ->with('title', 'Daftar Barang');
    }

    public function pelanggan()
    {
        return view('data.pelanggan')
                    ->with('title', 'Daftar Pelanggan');
    }

    public function pegawai()
    {
        return view('data.pegawai')
                    ->with('title', 'Daftar Pegawai');
    }

    public function supplier()
    {
        return view('data.supplier')
                    ->with('title', 'Daftar Supplier');
    }
}
