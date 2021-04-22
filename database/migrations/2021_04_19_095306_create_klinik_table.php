<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlinikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klinik', function (Blueprint $table) {
            $table->id('id_klinik');
            $table->string('nama_klinik');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('deskripsi');
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klinik');
    }
}
