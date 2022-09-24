<?php

namespace Tests\Feature;

use App\Models\Produk;
use App\Models\User;
use Carbon\Factory;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function test_create_new_data()
    {
        // user membuka halaman tambah data baru
        $response = $this->get('/produk/create');

        $response->assertStatus(500);

        $response->assertSeeText("Kode Produk");
        $response->assertSeeText("Nama Produk");
        $response->assertSeeText("Kategori");
        $response->assertSeeText("Harga Beli");
        $response->assertSeeText("Harga Jual");
        $response->assertSeeText("Stok");
        $response->assertSeeText("Gambar");

        $response->assertSeeText("Submit");
    }

    /** @test */
    public function test_kode_produk_is_required()
    {   
        # mencoba menambahkan data baru dengan kode_produk kosong
        $response = $this->post(route('produk.store'), [
            'kode_produk' => '',
            'nama_produk' => 'Buncis',
            'harga_beli' => 30000,
            'harga_jual' => 32000,
            'stok' => 56,
            'gambar' => 'style/img/sawi-hijau.jpg',
            'kategori_id' => 'Sayur'
        ]);

        # memastikan bahwa session memiliki error
        $response->assertSessionHasErrors('kode_produk');
    }

    public function test_nama_produk_is_required()
    {   
        # mencoba menambahkan data baru dengan nama_produk kosong
        $response = $this->post(route('produk.store'), [
            'kode_produk' => 'PS006',
            'nama_produk' => '',
            'harga_beli' => 30000,
            'harga_jual' => 32000,
            'stok' => 56,
            'gambar' => 'style/img/sawi-hijau.jpg',
            'kategori_id' => 'Sayur'
        ]);

        # memastikan bahwa session memiliki error
        $response->assertSessionHasErrors('nama_produk');
    }

    public function test_harga_beli_is_required()
    {   
        # mencoba menambahkan data baru dengan harga_beli kosong
        $response = $this->post(route('produk.store'), [
            'kode_produk' => 'PS006',
            'nama_produk' => 'Buncis',
            'harga_beli' => null,
            'harga_jual' => 32000,
            'stok' => 56,
            'gambar' => 'style/img/sawi-hijau.jpg',
            'kategori_id' => 'Sayur'
        ]);

        # memastikan bahwa session memiliki error
        $response->assertSessionHasErrors('harga_beli');
    }

    public function test_harga_jual_is_required()
    {   
        # mencoba menambahkan data baru dengan harga_jual kosong
        $response = $this->post(route('produk.store'), [
            'kode_produk' => 'PS006',
            'nama_produk' => 'Buncis',
            'harga_beli' => 30000,
            'harga_jual' => null,
            'stok' => 56,
            'gambar' => 'style/img/sawi-hijau.jpg',
            'kategori_id' => 'Sayur'
        ]);

        # memastikan bahwa session memiliki error
        $response->assertSessionHasErrors('harga_jual');
    }

    public function test_stok_is_required()
    {   
        # mencoba menambahkan data baru dengan stok kosong
        $response = $this->post(route('produk.store'), [
            'kode_produk' => 'PS006',
            'nama_produk' => 'Buncis',
            'harga_beli' => 30000,
            'harga_jual' => 32000,
            'stok' => null,
            'gambar' => 'style/img/sawi-hijau.jpg',
            'kategori_id' => 'Sayur'
        ]);

        # memastikan bahwa session memiliki error
        $response->assertSessionHasErrors('stok');
    }

    public function test_gambar_is_required()
    {   
        # mencoba menambahkan data baru dengan gambar kosong
        $response = $this->post(route('produk.store'), [
            'kode_produk' => 'PS006',
            'nama_produk' => 'Buncis',
            'harga_beli' => 30000,
            'harga_jual' => 32000,
            'stok' => 56,
            'gambar' => '',
            'kategori_id' => 'Sayur'
        ]);

        # memastikan bahwa session memiliki error
        $response->assertSessionHasErrors('gambar');
    }

    public function test_kategori_is_required()
    {   
        # mencoba menambahkan data baru dengan kategori kosong
        $response = $this->post(route('produk.store'), [
            'kode_produk' => 'PS006',
            'nama_produk' => 'Buncis',
            'harga_beli' => 30000,
            'harga_jual' => 32000,
            'stok' => 56,
            'gambar' => 'style/img/sawi-hijau.jpg',
            'kategori_id' => ''
        ]);

        # memastikan bahwa session memiliki error
        $response->assertSessionHasErrors('kategori_id');
    }

    public function user_can_show_product_detail()
    {
        // user membuka halaman data dengan index 1
        $response = $this->get('/produk/1');

        $response->assertStatus(500);

        $response->assertSeeText("Halaman Tampil Detail Produk");

        $response->assertSeeText("Kode Produk: PB001");
        $response->assertSeeText("Nama Produk: Apel");
        $response->assertSeeText("Kategori: Buah");
        $response->assertSeeText("Harga Beli: 18000");
        $response->assertSeeText("Harga Jual: 20000");
        $response->assertSeeText("Stok: 40");
        $response->assertSeeText("Gambar");

        $response->assertSeeText("Kembali");

    }

    /** @test */
    public function user_can_delete_existing_data()
    {
        # mencoba menambahkan data baru 
        $produk = Produk::create([
            'kode_produk' => 'PS006',
            'nama_produk' => 'Buncis',
            'harga_beli' => 30000,
            'harga_jual' => 32000,
            'stok' => 56,
            'gambar' => 'style/img/sawi-hijau.jpg',
            'kategori_id' => 2
        ]);

        // delete data
        Produk::destroy($produk->id);

        // check data di tabel produks
        $this->assertDatabaseMissing('produks', [
            'id' => $produk->id
        ]);
    }
}
