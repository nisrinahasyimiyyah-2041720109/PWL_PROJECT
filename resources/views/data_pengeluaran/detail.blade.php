@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Pengeluaran
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- <li class="list-group-item"><b>Tanggal: </b>{{$pengeluaran->tanggal}}</li> -->
                        <li class="list-group-item"><b>Deskripsi: </b>{{$pengeluaran->pengeluaran}}</li>
                        <li class="list-group-item"><b>Nominal: </b>{{$pengeluaran->nominal}}</li>
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('pengeluaran.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection