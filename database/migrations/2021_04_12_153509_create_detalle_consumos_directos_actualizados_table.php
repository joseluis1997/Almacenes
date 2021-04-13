<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleConsumosDirectosActualizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DETALLE_CONSUMOS_DIRECTOS_ACTUALIZADOS', function (Blueprint $table) {
            $table->string('ANTERIOR_COD_CONSUMO_DIRECTO');
            $table->string('ANTERIOR_COD_ARTICULO');
            $table->decimal('ANTERIOR_PRECIO_UNITARIO', 10, 2);
            $table->decimal('ANTERIOR_CANTIDAD', 10, 2);

            $table->string('NUEVO_COD_CONSUMO_DIRECTO');
            $table->string('NUEVO_COD_ARTICULO');
            $table->decimal('NUEVO_PRECIO_UNITARIO', 10, 2);
            $table->decimal('NUEVO_CANTIDAD', 10, 2);
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
        Schema::dropIfExists('DETALLE_CONSUMOS_DIRECTOS_ACTUALIZADOS');
    }
}
