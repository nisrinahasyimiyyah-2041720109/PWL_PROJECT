@extends('layout.master')

@section('content')
    <div class="table-responsive">
    <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('pegawai.create') }}">+ Tambah Data Pegawai</a>
        </div>

        <table class="table table-head-fixed table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Telepon</th>
                    <th>Jabatan</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blog as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->alamat }}</td>
                    <td>{{ $b->jenis_kelamin }}</td>
                    <td>{{ $b->nomor_telepon }}</td>
                    <td>{{ $b->jabatan }}</td>
                    <td>
                            <form action="{{ route('pegawai.destroy',['pegawai'=>$b->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin Menghapus Data Pegawai ?')">
                                <a class="btn btn-info" href="{{ route('pegawai.show',$b->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('pegawai.edit',$b->id) }}">Edit</a>
                    
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" >Delete</button>
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