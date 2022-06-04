@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail User
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nama: </b>{{$user->name}}</li> 
                        <li class="list-group-item"><b>Email: </b>{{$user->email}}</li>                        
                        <li class="list-group-item"><b>Alamat: </b>{{$user->alamat}}</li>
                        <li class="list-group-item"><b>Jenis Kelamin: </b>{{$user->jenis_kelamin}}</li>
                        <li class="list-group-item"><b>Nomor Telepon: </b>{{$user->nomor_telepon}}</li>
                        <li class="list-group-item"><b>Level: </b>{{$user->level}}</li> 
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('user.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection