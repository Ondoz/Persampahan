<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersampahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persampahans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sampah');
            $table->integer('berat');
            $table->unsignedBigInteger('kategoris_id');
            $table->unsignedBigInteger('daerah_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('kategoris_id')->references('id')->on('daerahs');
            $table->foreign('daerah_id')->references('id')->on('kategoris');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persampahans');
    }
}
