@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Sayur
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nama: </b>{{$sayur->nama}}</li>
                        <li class="list-group-item"><b>Kategori: </b>{{$sayur->kategori}}</li>
                        <li class="list-group-item"><b>Harga: </b>{{$sayur->harga}}</li>
                        <li class="list-group-item"><b>Stok: </b>{{$sayur->stok}}</li>
                        <li class="list-group-item"><b>Gambar: </b><img width="110px" src="{{asset('storage/'.$sayur->gambar)}}"></li>
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('sayur.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection