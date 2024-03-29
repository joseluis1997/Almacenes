<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumoDirectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CONSUMO_DIRECTOS', function (Blueprint $table) {
            $table->bigIncrements('COD_CONSUMO_DIRECTO');
            $table->unsignedBigInteger('COD_AREA');
            $table->unsignedBigInteger('COD_PROVEEDOR');
            $table->unsignedBigInteger('COD_USUARIO');
            $table->string('NRO_ORD_COMPRA')->unique();
            $table->string('NRO_PREVENTIVO')->unique();
            $table->string('NOTA_INGRESO')->unique();
            $table->date('FECHA');
            $table->string('COMPROBANTE');
            $table->string('DETALLE_CONSUMO');
            $table->boolean('ESTADO_COMPRA')->default(true);

            $table->foreign('COD_AREA')->references('COD_AREA')->on('AREAS')->onDelete('cascade');
            $table->foreign('COD_PROVEEDOR')->references('COD_PROVEEDOR')->on('PROVEEDORES')->onDelete('cascade');
            $table->foreign('COD_USUARIO')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('CONSUMO_DIRECTOS');
    }
}
