<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumosDirectosActualizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CONSUMOS_DIRECTOS_ACTUALIZADOS', function (Blueprint $table) {
            $table->string('ANTERIOR_COD_CONSUMO_DIRECTO');
            $table->string('ANTERIOR_COD_AREA');
            $table->string('ANTERIOR_COD_PROVEEDOR');
            $table->string('ANTERIOR_COD_USUARIO');
            $table->string('ANTERIOR_NRO_ORD_COMPRA');
            $table->string('ANTERIOR_NRO_PREVENTIVO');
            $table->string('ANTERIOR_NOTA_INGRESO');
            $table->date('ANTERIOR_FECHA');
            $table->string('ANTERIOR_COMPROBANTE');
            $table->string('ANTERIOR_DETALLE_CONSUMO');
            $table->string('ANTERIOR_ESTADO_COMPRA');
            $table->string('ANTERIOR_CREATED_AT');
            $table->string('ANTERIOR_UPDATED_AT');

            $table->string('NUEVO_COD_CONSUMO_DIRECTO');
            $table->string('NUEVO_COD_AREA');
            $table->string('NUEVO_COD_PROVEEDOR');
            $table->string('NUEVO_COD_USUARIO');
            $table->string('NUEVO_NRO_ORD_COMPRA');
            $table->string('NUEVO_NRO_PREVENTIVO');
            $table->string('NUEVO_NOTA_INGRESO');
            $table->date('NUEVO_FECHA');
            $table->string('NUEVO_COMPROBANTE');
            $table->string('NUEVO_DETALLE_CONSUMO');
            $table->string('NUEVO_ESTADO_COMPRA');
            $table->string('NUEVO_CREATED_AT');
            $table->string('NUEVO_UPDATED_AT');
            $table->string('USUARIO');
            $table->string('F_MODIFICACION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CONSUMOS_DIRECTOS_ACTUALIZADOS');
    }
}
