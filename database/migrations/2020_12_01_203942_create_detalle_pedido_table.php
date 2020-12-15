<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DETALLE_PEDIDO', function (Blueprint $table) {
            $table->bigIncrements('COD_DET_PEDIDO');

            $table->unsignedBigInteger('COD_ARTICULO');
            $table->unsignedBigInteger('COD_PEDIDO');

            $table->foreign('COD_ARTICULO')->references('COD_ARTICULO')->on('ARTICULO')->onDelete('cascade');

            $table->foreign('COD_PEDIDO')->references('COD_PEDIDO')->on('PEDIDOS')->onDelete('cascade');

            $table->integer('CANTIDAD');
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
        Schema::dropIfExists('detalle_pedido');
    }
}
