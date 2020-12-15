<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SALIDAS', function (Blueprint $table) {
            $table->bigIncrements('COD_SALIDA');

            $table->unsignedBigInteger('COD_PEDIDO');
            $table->unsignedBigInteger('COD_ESTRUCTURA_G');

            $table->foreign('COD_ESTRUCTURA_G')->references('COD_ESTRUCTURA_G')->on('ESTRUCTURA_G')->onDelete('cascade');

            $table->foreign('COD_PEDIDO')->references('COD_PEDIDO')->on('PEDIDOS')->onDelete('cascade');

           
            
            $table->date('FECHA');
            $table->string('DETALLE_SALIDA');
            $table->boolean('ESTADO_SALIDA')->default(true);

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
        Schema::dropIfExists('SALIDAS');
    }
}
