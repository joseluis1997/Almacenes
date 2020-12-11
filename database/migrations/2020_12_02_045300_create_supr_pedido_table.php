<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuprPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SUPR_PEDIDO', function (Blueprint $table) {
            $table->bigIncrements('COD_SUPR_PEDIDO');

            $table->unsignedBigInteger('COD_PEDIDO');
            $table->foreign('COD_PEDIDO')->references('COD_PEDIDO')->on('PEDIDOS')->onDelete('cascade');

            $table->unsignedBigInteger('COD_USUARIO');
            $table->foreign('COD_USUARIO')->references('id')->on('users')->onDelete('cascade');

            $table->date('FECHA');
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
        Schema::dropIfExists('SUPR_PEDIDO');
    }
}
