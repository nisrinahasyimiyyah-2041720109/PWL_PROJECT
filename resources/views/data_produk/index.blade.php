@extends('layout.master')

@section('content')
    <div class="table-responsive">
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('produk.create') }}">+ Tambah Data Produk</a>
        </div>
        <table class="table table-head-fixed table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>                   
                    <th>Kategori</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blog as $b)
                    <tr>
                        <td>{{ $b->id }}</td>
                        <td>{{ $b->kode_produk }}</td>
                        <td>{{ $b->nama_produk }}</td>                      
                        <td>{{ $b->kategori }}</td>
                        <td>{{ $b->harga_beli }}</td>
                        <td>{{ $b->harga_jual }}</td>
                        <td>{{ $b->stok }}</td>
                        <td><img width="110px" src="{{asset('storage/'.$b->gambar)}}"></td>
                        <td>
                            <form action="{{ route('produk.destroy',['produk'=>$b->id]) }}" method="POST" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin Menghapus Data Produk?')">
                                <a class="btn btn-info" href="{{ route('produk.show',$b->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('produk.edit',$b->id) }}">Edit</a>
                    
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>           
        </table>
    </div>
    <div class="d-flex">
        {{ $blog->links() }}
    </div>
@endsection