@extends('layout.master')

@section('title')
    Transaksi Penjualan
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Transaksi Penjualan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                <div class="alert alert-success alert-dismissible">
                    <i class="fa fa-check icon"></i>
                    Data Transaksi telah selesai.
                </div>
            </div>
            <div class="box-footer">
                <div class="row">
                    <a class="btn btn-warning btn-flat" href="{{ route('transaksi.baru') }}">Transaksi Baru</a>
                    <a class="btn btn-info btn-flat" href="{{ route('cetak_pdf',$detail->id_penjualan) }}" target="_blank">Cetak Nota</a>
                </div><br>
            </div>
        </div>
    </div>
</div>
@endsection