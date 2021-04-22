<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemesananProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanan_produk', function (Blueprint $table) {
            $table->id('id_detail_pp');
            $table->unsignedBigInteger('id_pp');
            $table->unsignedBigInteger('id_produk');
            $table->BigInteger('jumlah');
            $table->BigInteger('total');
            $table->timestamps();

            $table->foreign('id_pp')->references('id_pp')->on('pemesanan_produk');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pemesanan_produk');
    }
}
