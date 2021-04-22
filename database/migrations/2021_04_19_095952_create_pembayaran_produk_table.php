<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_produk', function (Blueprint $table) {
            $table->id('id_pembayaran_produk');
            $table->unsignedBigInteger('id_pp');
            $table->string('bukti_tf');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_pp')->references('id_pp')->on('pemesanan_produk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_produk');
    }
}
