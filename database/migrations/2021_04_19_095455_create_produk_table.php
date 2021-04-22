<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('nama_produk');
            $table->string('jenis_produk');
            $table->BigInteger('harga_produk');
            $table->BigInteger('stok');
            $table->string('gambar');
            $table->unsignedBigInteger('id_klinik');

            $table->timestamps();

            $table->foreign('id_klinik')->references('id_klinik')->on('klinik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
