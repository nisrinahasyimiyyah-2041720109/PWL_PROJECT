@extends('layout.master')

@section('content')
    <div class="table-responsive">
    <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('supplier.create') }}">+ Tambah Data Supplier</a>
        </div>
        <table class="table table-head-fixed table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blog as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->alamat }}</td>
                    <td>{{ $b->nomor_telepon }}</td>
                    <td>
                            <form action="{{ route('supplier.destroy',['supplier'=>$b->id]) }}" method="POST" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin Menghapus Data Supplier?')">
                                <a class="btn btn-info" href="{{ route('supplier.show',$b->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('supplier.edit',$b->id) }}">Edit</a>
                    
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
    <div class="d-flex" >
        {{ $blog->links() }}
    </div>
    @endsection