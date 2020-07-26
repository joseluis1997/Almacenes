<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ARTICULO', function (Blueprint $table) {
            $table->bigIncrements('COD_ARTICULO');
            
            $table->unsignedBigInteger('COD_PARTIDA');
            $table->unsignedBigInteger('COD_MEDIDA');

            $table->foreign('COD_PARTIDA')->references('COD_PARTIDA')->on('PARTIDA')->onDelete('cascade');
            
            $table->foreign('COD_MEDIDA')->references('COD_MEDIDA')->on('MEDIDA')->onDelete('cascade');
            

            $table->string('ITEM');
            $table->string('NOM_ARTICULO')->unique();
            $table->string('DESC_ARTICULO')->nullable();
            $table->string('CANT_ACTUAL');
            $table->string('CANT_MINIMA');
            $table->string('UBICACION')->nullable();
            $table->string('TIPO');
            $table->boolean('ESTADO_ARTICULO')->default(true);
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
        Schema::dropIfExists('ARTICULO');
    }
}
