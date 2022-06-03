@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Supplier
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nama: </b>{{$supplier->nama}}</li>
                        <li class="list-group-item"><b>Alamat: </b>{{$supplier->alamat}}</li>
                        <li class="list-group-item"><b>Nomor Telepon: </b>{{$supplier->nomor_telepon}}</li>
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('supplier.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection