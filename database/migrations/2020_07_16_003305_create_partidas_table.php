<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PARTIDA', function (Blueprint $table) {
            $table->bigIncrements('COD_PARTIDA');
            $table->string('NOM_PARTIDA')->unique();
            $table->string('PADRE')->nullable();
            $table->string('NRO_PARTIDA');
            $table->boolean('VALOR')->default(true);
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
        Schema::dropIfExists('PARTIDA');
    }
}
