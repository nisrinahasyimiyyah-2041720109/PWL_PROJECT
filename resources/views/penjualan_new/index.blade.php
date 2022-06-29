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
                <form class="row g-3 mt-3" method="post" action="{{ route('transaksi.store') }}" id="myForm">
                    @csrf
                        <label for="pilih_produk" class="col-sm-3 col-form-label">Product</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="pilih_produk" id="pilih_produk">
                                    <option>-- Pilih Product --</option> 
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}"> {{ $produk->nama_produk }} </option>
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
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">qty</th>
                            <th scope="col">Harga/Qty</th>
                            <th scope="col" style="width: 200px;">Total</th>
                            <th scope="col" style="width: 10px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail as $p)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $p->produk->nama_produk }}  </td>
                            <td>
                                <div> 
                                    <!--<button class="btn btn-danger btn-sm" id="decrement">-</button>-->                                 
                                    <input type="text" class="form-control qty" value="{{ $p->jumlah }}">
                                    <!--<a href="" class="btn btn-success btn-sm">+</a>-->
                                    <!--<button class="btn btn-success btn-sm" id="increment">+</button>-->
                                </div>
                            </td>
                            <td>Rp. {{ $p->harga_jual }} </td>
                            <td>Rp. {{ $p->harga_jual*$p->jumlah }} </td>
                            <td>
                                <form action="{{ route('transaksi.destroy',['transaksi'=>$p->id_penjualan_detail]) }}" method="POST" method="POST" class="d-inline" 
                                    onsubmit="return confirm('Apakah Anda Yakin Menghapus Data Produk?')">
                    
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
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
                            <td>
                                <div class="form-group">
                                    <label style="text-align:left;" for="total">Total Pembelian</label>
                                    <input type="text" name="total" class="form-control" id="total" value="Rp {{ $detail->sum('subtotal') }}" 
                                    aria-describedby="total" readonly>
                                </div>
                            </td>                            
                                    
                            <tr>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                
                                <td style="text-align:left;">
                                    <div class="form-group">
                                        <label for="bayar">Pembayaran</label>
                                        <input type="text" name="bayar" class="form-control" id="bayar" 
                                        aria-describedby="bayar">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                
                                <td style="text-align:left;">
                                    <div class="form-group">
                                        <label for="kembalian">Kembalian</label>
                                        <input type="text" name="kembalian" class="form-control" id="kembalian" 
                                        aria-describedby="kembalian" readonly>
                                    </div>
                                </td>
                            </tr>             
                        </tfoot>                 
                    </table>
                    <div class="col-sm-12">
                        <button class="btn btn-success btn-sm float-right">Simpan Transaksi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

