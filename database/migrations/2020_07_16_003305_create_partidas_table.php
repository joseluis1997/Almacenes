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

            $table->unsignedBigInteger('PARTIDA_PADRE')->nullable();
            $table->foreign('PARTIDA_PADRE')->references('COD_PARTIDA')->on('PARTIDA')->onDelete('cascade');

            $table->string('NOM_PARTIDA')->unique();
            $table->string('NRO_PARTIDA')->unique();
            $table->boolean('ESTADO_PARTIDA')->default(true);
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
