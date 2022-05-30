@extends('layout.master')

@section('content')
    <div class="table-responsive">
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('buah.create') }}">+ Tambah Data Buah</a>
        </div>
        <table class="table table-head-fixed table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blog as $b)
                    <tr>
                        <td>{{ $b->id }}</td>
                        <td>{{ $b->nama }}</td>
                        <td>{{ $b->kategori }}</td>
                        <td>{{ $b->harga }}</td>
                        <td>{{ $b->stok }}</td>
                        <td><img width="110px" src="{{asset('storage/'.$b->gambar)}}"></td>
                        <td>
                            <form action="{{ route('buah.destroy',['buah'=>$b->id]) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('buah.show',$b->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('buah.edit',$b->id) }}">Edit</a>
                    
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