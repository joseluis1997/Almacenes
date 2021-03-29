<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleConsumoDirectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DETALLE_CONSUMO_DIRECTO', function (Blueprint $table) {
            // $table->bigIncrements('COD_DET_CONSUMO_DIRECTO');

            $table->unsignedBigInteger('COD_CONSUMO_DIRECTO');

            $table->foreign('COD_CONSUMO_DIRECTO')->references('COD_CONSUMO_DIRECTO')->on('CONSUMO_DIRECTOS')->onDelete('cascade');

            $table->unsignedBigInteger('COD_ARTICULO');
            
            $table->foreign('COD_ARTICULO')->references('COD_ARTICULO')->on('ARTICULO')->onDelete('cascade');

            $table->decimal('PRECIO_UNITARIO',10,2);
            $table->decimal('CANTIDAD',10,2);
            // $table->integer('CANT_DISPONIBLE');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DETALLE_CONSUMO_DIRECTO');
    }
}
