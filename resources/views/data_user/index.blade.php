@extends('layout.master')

@section('content')
    <div class="table-responsive">
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('user.create') }}">+ Tambah Data User</a>
        </div>
        <table class="table table-head-fixed table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>           
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Telepon</th>
                    <th>Level</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blog as $b)
                    <tr>
                        <td>{{ $b->id }}</td>
                        <td>{{ $b->name }}</td>       
                        <td>{{ $b->email }}</td>               
                        <td>{{ $b->alamat }}</td>
                        <td>{{ $b->jenis_kelamin }}</td>
                        <td>{{ $b->nomor_telepon }}</td>
                        <td>{{ $b->level }}</td>
                        <td>
                            <form action="{{ route('user.destroy',['user'=>$b->id]) }}" method="POST" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin Menghapus Data User?')">
                                <a class="btn btn-info" href="{{ route('user.show',$b->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('user.edit',$b->id) }}">Edit</a>
                    
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