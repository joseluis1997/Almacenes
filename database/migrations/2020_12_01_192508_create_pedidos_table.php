<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PEDIDOS', function (Blueprint $table) {
            $table->bigIncrements('COD_PEDIDO');
            
            $table->unsignedBigInteger('COD_AREA')->unique();

            $table->foreign('COD_AREA')->references('COD_AREA')->on('AREAS')->onDelete('cascade');
            
            $table->string('DETALLE_PEDIDO');
            $table->boolean('VALIDADO')->default(false);
            $table->date('FECHA');
            $table->boolean('ESTADO_PEDIDO')->default(true);
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
        Schema::dropIfExists('pedidos');
    }
}
