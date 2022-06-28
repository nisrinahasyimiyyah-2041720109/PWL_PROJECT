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
                    <form method="post" action="{{ route('produk.update',$produk->id) }}" enctype="multipart/form-data" id="myForm">                     
                        @csrf 
                        @method('PUT')       
                            <div class="form-group">
                                <label for="kode_produk">Kode Produk</label>
                                <input type="text" name="kode_produk" class="form-control" id="kode_produk" value="{{ $produk->kode_produk }}" 
                                aria-describedby="kode_produk">
                            </div>                                     
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="{{ $produk->nama_produk }}" 
                                aria-describedby="nama_produk">
                            </div>                          
                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select class="form-control" name="kategori_id" id="kategori_id" aria-describedby="kategori_id">                               
                                @foreach($kategori as $ktg)    
                                    <option value="{{$ktg->id}}" {{$produk->kategori_id == $ktg->id ? 'selected' : ''}}>{{$ktg->nama_kategori}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga_beli">Harga Beli</label>
                                <input type="text" name="harga_beli" class="form-control" id="harga_beli" value="{{ $produk->harga_beli }}" 
                                aria-describedby="harga_beli">
                            </div>
                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="text" name="harga_jual" class="form-control" id="harga_jual" value="{{ $produk->harga_jual }}" 
                                aria-describedby="harga_jual">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" name="stok" class="form-control" id="stok" value="{{ $produk->stok }}" 
                                aria-describedby="stok">
                            </div>
                            <div class="form-group"> 
                                <label for="gambar">Gambar</label> 
                                <input type="file" class="form-control" name="gambar" id="gambar" value="{{$produk->gambar}}"></br> 
                                <img width="50px" src="{{asset('storage/'.$produk->gambar)}}"> 
                            </div> 
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection