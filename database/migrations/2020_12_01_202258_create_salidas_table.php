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
            $table->unsignedBigInteger('COD_AREA');
            $table->unsignedBigInteger('COD_USUARIO');
            

            $table->foreign('COD_AREA')->references('COD_AREA')->on('AREAS')->onDelete('cascade');

            $table->foreign('COD_PEDIDO')->references('COD_PEDIDO')->on('PEDIDOS')->onDelete('cascade');
            $table->foreign('COD_USUARIO')->references('id')->on('users')->onDelete('cascade');
            
           
            
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
