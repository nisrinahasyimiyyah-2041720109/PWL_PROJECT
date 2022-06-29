@extends('layout.master')

@section('content')
    <div>
        <style>
            .qty {
                width: 20%;
                display: inline;
            }
        </style>
        <div class="card-body pb-5 p-0 mt-10">
            <div class="form-group row pb-7">
                <form class="row g-3 mt-3" method="post" action="{{ route('pembelian.store') }}" id="myForm">
                    @csrf
                        <label for="pilih_supplier" class="col-sm-3 col-form-label">Supplier</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="pilih_supplier" id="pilih_supplier">
                                    <option>-- Pilih Supplier --</option> 
                                @foreach ($supplier as $s)
                                    <option value="{{ $s->id }}"> {{ $s->nama}} </option>
                                @endforeach
                            </select>
                            <!--
                            @error('id_produk')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror-->
                        </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success w-100">Submit</button>
                    </div>
                </form>
                    
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="card-body border-top pb-5 p-0 mt-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Supplier</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Total Beli</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col" style="width: 200px;">Total</th>
                            <th scope="col" style="width: 10px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembelian as $p)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $p->supplier->nama }}  </td>
                            <td>
                                <div> 
                                    <!--<button class="btn btn-danger btn-sm" id="decrement">-</button>-->                                 
                                    <input type="text" class="form-control qty" value="{{ $p->jumlah }}">
                                    <!--<a href="" class="btn btn-success btn-sm">+</a>-->
                                    <!--<button class="btn btn-success btn-sm" id="increment">+</button>-->
                                </div>
                            </td>
                            <td>Rp. {{ $p->harga_beli }} </td>
                            <td>Rp. {{ $p->harga_beli*$p->jumlah }} </td>
                            <td>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <form action="{{ route('transaksi.simpan') }}" class="form-penjualan" method="post">
                        @csrf
                        <tfoot>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align:left;">Total Pembelian</td>
                            <td>
                                <input type="text" id="total" name="total_beli" class="form-control">
                            </td>
                                    
                            <tr>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="text-align:left;">Pembayaran</td>
                                <td style="text-align:left;">
                                    <input type="text" id="bayar" name="bayar" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="text-align:left;">Kembalian</td>
                                <td style="text-align:left;">
                                    <input type="text" id="kembalian" value="Rp " readonly/>
                                </td>
                            </tr>             
                        </tfoot>                 
                    </table>
                    <div class="col-sm-12">
                        <button class="btn btn-success btn-sm float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@push('scripts')
<script type="text/javascript">
    $('input').keyup(function() {
        var txtFirstNumberValue = document.getElementById('bayar').value;
        var txtSecondNumberValue = document.getElementById('total').value;
        var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
            if (result!="") {
                document.getElementById('kembalian').value = result;
            }
    })
</script>
@endpush
@endsection