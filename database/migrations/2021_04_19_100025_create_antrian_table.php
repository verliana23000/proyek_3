<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntrianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->id('id_antrian');
            $table->string('no_antrian');
            $table->UnsignedBigInteger('id_member');
            $table->UnsignedBigInteger('id_treatment');
            $table->string('waktu');
            $table->timestamps();

            $table->foreign('id_member')->references('id_member')->on('member');
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
        Schema::dropIfExists('antrian');
    }
}
