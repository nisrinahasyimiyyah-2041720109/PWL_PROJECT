<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiPenjualanPenjualanDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penjualan_details', function (Blueprint $table) {
            $table->foreign('id_penjualan')->references('id_penjualan')->on('penjualans'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penjualan_details', function (Blueprint $table) {
            $table->dropForeign(['id_penjualan']);
        });
    }
}
