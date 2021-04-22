<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_treatment', function (Blueprint $table) {
            $table->id('id_pt');
            $table->unsignedBigInteger('id_member');
            $table->unsignedBigInteger('id_klinik');
            $table->string('nama_treatment');
            $table->timestamp('waktu');
            $table->integer('metode_pembayaran');
            $table->string('ket_batal');
            $table->timestamps();

            $table->foreign('id_member')->references('id_member')->on('member');
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
        Schema::dropIfExists('pemesanan_treatment');
    }
}
