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
            
            $table->unsignedBigInteger('COD_AREA');
            $table->foreign('COD_AREA')->references('COD_AREA')->on('AREA')->onDelete('cascade');
            
            $table->string('DETALLE_PEDIDO');
            $table->string('NOTA');
            $table->string('VALIDADO');
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
