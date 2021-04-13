<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosActualizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ARTICULOS_ACTUALIZADOS', function (Blueprint $table) {
            $table->string('ANTERIOR_COD_ARTICULO');
            $table->string('ANTERIOR_FK_COD_PARTIDA');
            $table->string('ANTERIOR_FK_COD_MEDIDA');
            $table->string('ANTERIOR_NOM_ARTICULO');
            $table->string('ANTERIOR_DESC_ARTICULO');
            $table->decimal('ANTERIOR_CANT_ACTUAL', 10, 2);
            $table->string('ANTERIOR_MARCA');
            $table->string('ANTERIOR_ESTADO_ARTICULO');
            $table->string('ANTERIOR_CREATED_AT');
            $table->string('ANTERIOR_UPDATED_AT');

            $table->string('NUEVO_COD_ARTICULO');
            $table->string('NUEVO_FK_COD_PARTIDA');
            $table->string('NUEVO_FK_COD_MEDIDA');
            $table->string('NUEVO_NOM_ARTICULO');
            $table->string('NUEVO_DESC_ARTICULO');
            $table->decimal('NUEVO_CANT_ACTUAL', 10, 2);
            $table->string('NUEVO_MARCA');
            $table->string('NUEVO_ESTADO_ARTICULO');
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
        Schema::dropIfExists('ARTICULOS_ACTUALIZADOS');
    }
}
