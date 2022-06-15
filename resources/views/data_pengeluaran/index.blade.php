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
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Nominal</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blog as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <!-- <td>{{ $b->tanggal }}</td> -->
                    <td>{{ $b->deskripsi }}</td>
                    <td>{{ $b->nominal }}</td>
                    <td>
                            <form action="{{ route('pengeluaran.destroy',['pengeluaran'=>$b->id]) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('pengeluaran.show',$b->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('pengeluaran.edit',$b->id) }}">Edit</a>
                    
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