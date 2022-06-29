@extends('layout.master')

@section('content')
    <div class="table-responsive">
        <table class="table table-head-fixed table-hover">
            <thead>
                <tr>
                    <th>ID Penjualan</th>
                    <th>Nama Customer</th>
                    <th>Total Item</th>                   
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paginate as $p)
                    <tr>
                        <td>{{ $p->id_penjualan }}</td>
                        <td>{{ $p->user->name }}</td>                      
                        <td>{{ $p->total_item }}</td>
                        <td>{{ $p->total_harga }}</td>
                    </tr>
                @endforeach
            </tbody>           
        </table>
    </div>
    <div class="d-flex">
        {{ $paginate->links() }}
    </div>
@endsection