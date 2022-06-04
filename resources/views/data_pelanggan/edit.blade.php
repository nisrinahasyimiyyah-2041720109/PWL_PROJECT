@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Data Produk
                </div>
                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There Were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form method="post" action="{{ route('pelanggan.update',$pelanggan->id) }}" enctype="multipart/form-data" id="myForm">                     
                        @csrf 
                        @method('PUT')       
                            <div class="form-group">
                                <label for="kode_pelanggan">Kode Pelanggan</label>
                                <input type="text" name="kode_pelanggan" class="form-control" id="kode_pelanggan" value="{{ $pelanggan->kode_pelanggan }}" 
                                aria-describedby="kode_pelanggan">
                            </div>                                     
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ $pelanggan->nama }}" 
                                aria-describedby="nama">
                            </div>                          
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $pelanggan->alamat }}" 
                                aria-describedby="alamat">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" value="{{ $pelanggan->jenis_kelamin }}" 
                                aria-describedby="jenis_kelamin">
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="text" name="nomor_telepon" class="form-control" id="nomor_telepon" value="{{ $pelanggan->nomor_telepon }}" 
                                aria-describedby="nomor_telepon">
                            </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection