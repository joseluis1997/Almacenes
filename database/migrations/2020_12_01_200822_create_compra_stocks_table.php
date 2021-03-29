<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('COMPRA_STOCKS', function (Blueprint $table) {
            $table->bigIncrements('COD_COMPRA_STOCK');
            $table->unsignedBigInteger('COD_AREA');
            $table->unsignedBigInteger('COD_PROVEEDOR');
            $table->unsignedBigInteger('COD_USUARIO');


            $table->foreign('COD_AREA')->references('COD_AREA')->on('AREAS')->onDelete('cascade');
            $table->foreign('COD_PROVEEDOR')->references('COD_PROVEEDOR')->on('PROVEEDORES')->onDelete('cascade');
            $table->foreign('COD_USUARIO')->references('id')->on('users')->onDelete('cascade');

            $table->string('NRO_ORD_COMPRA')->unique();
            $table->string('NRO_PREVENTIVO')->unique();
            $table->string('COMPROBANTE');
            $table->date('FECHA');
            $table->string('DETALLE_COMPRA');
            $table->boolean('ESTADO_COMPRA')->default(true);
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
        Schema::dropIfExists('COMPRA_STOCKS');
    }
}
