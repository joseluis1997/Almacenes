<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCompraStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DETALLE_COMPRA_STOCK', function (Blueprint $table) {
            // $table->bigIncrements('COD_DET_COMPRA_STOCK');

            $table->unsignedBigInteger('COD_COMPRA_STOCK');
            $table->unsignedBigInteger('COD_ARTICULO');

            $table->foreign('COD_COMPRA_STOCK')->references('COD_COMPRA_STOCK')->on('COMPRA_STOCKS')->onDelete('cascade');

            $table->foreign('COD_ARTICULO')->references('COD_ARTICULO')->on('ARTICULO')->onDelete('cascade');

            $table->integer('CANTIDAD');
            $table->decimal('PRECIO_UNITARIO');
            // $table->integer('TOTAL');
            $table->boolean('ESTADO_DETALLE')->default(true);

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
        Schema::dropIfExists('detalle_compra_stock');
    }
}
