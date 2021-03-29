<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuprCompraStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('SUPR_COMPRA_STOCK', function (Blueprint $table) {
        //     $table->bigIncrements('COD_SUPR_COMPRA_STOCK');

        //     $table->unsignedBigInteger('COD_COMPRA_STOCK');
        //     $table->foreign('COD_COMPRA_STOCK')->references('COD_COMPRA_STOCK')->on('COMPRA_STOCKS')->onDelete('cascade');

        //     $table->unsignedBigInteger('COD_USUARIO');
        //     $table->foreign('COD_USUARIO')->references('id')->on('users')->onDelete('cascade');

        //     $table->date('FECHA');

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('SUPR_COMPRA_STOCK');
    }
}
