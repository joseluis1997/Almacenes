<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DETALLE_SALIDA', function (Blueprint $table) {
            $table->bigIncrements('COD_DETALLE_SALIDA');

            $table->unsignedBigInteger('COD_SALIDA');
            $table->unsignedBigInteger('COD_ARTICULO');

            $table->foreign('COD_SALIDA')->references('COD_SALIDA')->on('SALIDAS')->onDelete('cascade');
            $table->foreign('COD_ARTICULO')->references('COD_ARTICULO')->on('ARTICULO')->onDelete('cascade');

            $table->integer('CANTIDAD');

            // $table->boolean('ESTADO_DETALLE')->default(true);
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
        Schema::dropIfExists('DETALLE_SALIDA');
    }
}
