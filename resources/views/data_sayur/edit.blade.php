@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Data Sayur
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
                    <form method="post" action="{{ route('sayur.update',$sayur->id) }}" enctype="multipart/form-data" id="myForm">                     
                        @csrf 
                        @method('PUT')                                            
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ $sayur->nama }}" 
                                aria-describedby="nama">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" name="kategori" id="kategori" aria-describedby="kategori">                               
                                    <option value="{{$sayur->kategori}}" {{$sayur->kategori ? 'selected' : ''}}>{{$sayur->kategori}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" value="{{ $sayur->harga }}" 
                                aria-describedby="harga">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" name="stok" class="form-control" id="stok" value="{{ $sayur->stok }}" 
                                aria-describedby="stok">
                            </div>
                            <div class="form-group"> 
                                <label for="gambar">Gambar</label> 
                                <input type="file" class="form-control" name="gambar" id="gambar" value="{{$sayur->gambar}}"></br> 
                                <img width="50px" src="{{asset('storage/'.$sayur->gambar)}}"> 
                            </div> 
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection