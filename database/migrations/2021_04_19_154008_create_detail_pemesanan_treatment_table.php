<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemesananTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanan_treatment', function (Blueprint $table) {
            $table->id('id_detail_pt');
            $table->unsignedBigInteger('id_pt');
            $table->unsignedBigInteger('id_treatment');
            $table->string('jumlah');
            $table->string('total');
            $table->timestamps();

            $table->foreign('id_pt')->references('id_pt')->on('pemesanan_treatment');
            $table->foreign('id_treatment')->references('id_treatment')->on('treatment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pemesanan_treatment');
    }
}
