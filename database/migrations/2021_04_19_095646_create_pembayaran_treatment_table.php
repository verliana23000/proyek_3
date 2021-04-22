<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_treatment', function (Blueprint $table) {
            $table->id('id_pembayaran_treatment');
            $table->unsignedBigInteger('id_pt');
            $table->string('bukti_tf');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_pt')->references('id_pt')->on('pemesanan_treatment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_treatment');
    }
}
