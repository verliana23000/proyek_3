<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment', function (Blueprint $table) {
            $table->id('id_treatment');
            $table->unsignedBigInteger('id_klinik');
            $table->string('nama_treatment');
            $table->string('jenis_treatment');
            $table->BigInteger('harga_treatment');
            $table->string('gambar');
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
        Schema::dropIfExists('treatment');
    }
}
