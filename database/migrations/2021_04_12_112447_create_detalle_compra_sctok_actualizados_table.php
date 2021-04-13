<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCompraSctokActualizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DETALLE_COMPRA_STOCK_ACTUALIZADOS', function (Blueprint $table) {
            $table->string('ANTERIOR_COD_COMPRA_STOCK');
            $table->string('ANTERIOR_COD_ARTICULO');
            $table->decimal('ANTERIOR_CANTIDAD', 10, 2);
            $table->decimal('ANTERIOR_PRECIO_UNITARIO', 10, 2);
            $table->string('ANTERIOR_ESTADO_DETALLE');

            $table->string('NUEVO_COD_COMPRA_STOCK');
            $table->string('NUEVO_COD_ARTICULO');
            $table->decimal('NUEVO_CANTIDAD', 10, 2);
            $table->decimal('NUEVO_PRECIO_UNITARIO', 10, 2);
            $table->string('NUEVO_ESTADO_DETALLE');
            $table->string('USUARIO');
            $table->date('F_MODIFICACION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DETALLE_COMPRA_STOCK_ACTUALIZADOS');
    }
}
