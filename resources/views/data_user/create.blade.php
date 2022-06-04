@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Data User
                </div>
                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data" id="myForm">
                        @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" aria-describedby="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control" id="password" aria-describedby="password">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" aria-describedby="jenis_kelamin">
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="text" name="nomor_telepon" class="form-control" id="nomor_telepon" aria-describedby="nomor_telepon">
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <input type="text" name="level" class="form-control" id="level" aria-describedby="level">
                            </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection