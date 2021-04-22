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
            $table->UnsignedBigInteger('id_member');
            $table->string('jenis_antrian');
            $table->string('nama_member');
            $table->string('no_telp');
            $table->string('no_antrian');
            $table->string('waktu');
            $table->timestamps();

            $table->foreign('id_member')->references('id_member')->on('member');
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
