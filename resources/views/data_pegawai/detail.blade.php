@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Pegawai
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nama: </b>{{$pegawai->nama}}</li>
                        <li class="list-group-item"><b>Alamat: </b>{{$pegawai->alamat}}</li>
                        <li class="list-group-item"><b>Jenis Kelamin: </b>{{$pegawai->jenis_kelamin}}</li>
                        <li class="list-group-item"><b>Nomor Telepon: </b>{{$pegawai->nomor_telepon}}</li>
                        <li class="list-group-item"><b>Jabatan: </b>{{$pegawai->jabatan}}</li>
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('pegawai.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection