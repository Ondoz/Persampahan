<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersampahanSaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persampahan_saran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persampahan_id');
            $table->unsignedBigInteger('saran_id');
            $table->timestamps();

            $table->foreign('persampahan_id')->references('id')->on('persampahans');
            $table->foreign('saran_id')->references('id')->on('sarans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persampahan_saran');
    }
}
