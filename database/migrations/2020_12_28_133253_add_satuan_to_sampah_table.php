<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSatuanToSampahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sampahs', function (Blueprint $table) {
            $table->enum('satuan', ['Kg(Kilogram)', 'G(Gram)'])->default('G(Gram)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sampahs', function (Blueprint $table) {
            $table->dropIfExists('satuan');
        });
    }
}
