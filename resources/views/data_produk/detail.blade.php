@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Produk
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Kode Produk: </b>{{$produk->kode_produk}}</li>
                        <li class="list-group-item"><b>Nama Produk: </b>{{$produk->nama_produk}}</li>                       
                        <li class="list-group-item"><b>Kategori: </b>{{$produk->kategori->nama_kategori}}</li>
                        <li class="list-group-item"><b>Harga Beli: </b>{{$produk->harga_beli}}</li>
                        <li class="list-group-item"><b>Harga Jual: </b>{{$produk->harga_jual}}</li>
                        <li class="list-group-item"><b>Stok: </b>{{$produk->stok}}</li>
                        <li class="list-group-item"><b>Gambar: </b><img width="110px" src="{{asset('storage/'.$produk->gambar)}}"></li>
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('produk.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection