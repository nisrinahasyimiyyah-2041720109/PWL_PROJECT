<!DOCTYPE html> 
<html> 
    <head> 
        <title>Nota Transaksi - VegeFruit</title> 

        <style>
            table td {
                font-size: 14px;
            }
            table.data td,
            table.data th {
                border: 1px solid #ccc;
                padding: 8px;
            }
            table.data {
                border-collapse: collapse;
            }
            .text-center-toko {
                text-align: center;
                font-size: 16px;
            }
            .text-center-jalan {
                text-align: center;
                font-size: 12px;
            }
            .text-center {
                text-align: center;
            }
            .text-right {
                text-align: right;
            }
            .title {
                font-weight: bold;
                font-size: 23px;
            }
        </style>
    </head> 

    <body>
        <center>
            <h3 class="title">VEGEFRUIT</h3>

            <h4 class="text-center-toko">Toko Buah dan Sayur</h4>
            <p class="text-center-jalan">Jl. Raya Kemuning No.12, Kel. Jati, Kec. Jatisari, Surabaya</p>
        </center><br><br>
        <table width="100%">
            <tr>
                <td>Tanggal</td>
                <td>: {{ tanggal_indonesia(date('Y-m-d')) }}</td>
                <td>Customer</td>
                <td>: {{ Auth::user()->name }}</td>
            </tr>
        </table>

        <table class="data" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $key => $item)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td>{{ $item->produk->kode_produk }}</td>
                        <td>{{ $item->produk->nama_produk }}</td>                       
                        <td class="text-right">{{ format_uang($item->harga_jual) }}</td>
                        <td class="text-right">{{ format_uang($item->jumlah) }}</td>
                        <td class="text-right">{{ format_uang($item->subtotal) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-right"><b>Total Harga</b></td>
                    <td class="text-right"><b>{{ format_uang($penjualan->total_harga) }}</b></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-right"><b>Tunai</b></td>
                    <td class="text-right"><b>{{ format_uang($penjualan->bayar) }}</b></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-right"><b>Kembali</b></td>
                    <td class="text-right"><b>{{ format_uang($penjualan->diterima) }}</b></td>
                </tr>
            </tfoot>
        </table>

        <table width="100%">
            <tr>
                <br><br>
                <td><center><b>Terimakasih telah berbelanja dan sampai jumpa</b></center></td>
            </tr>
        </table>
    </body> 
</html> 