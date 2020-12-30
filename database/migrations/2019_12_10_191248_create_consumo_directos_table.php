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
            $table->string('NRO_ORD_COMPRA');
            $table->string('NRO_PREVENTIVO');
            $table->string('NOTA_INGRESO');
            $table->date('FECHA');
            $table->string('FACTURA');
            $table->string('DETALLE_CONSUMO');
            $table->boolean('ESTADO_COMPRA')->default(true);

            $table->foreign('COD_AREA')->references('COD_AREA')->on('AREAS')->onDelete('cascade');

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
