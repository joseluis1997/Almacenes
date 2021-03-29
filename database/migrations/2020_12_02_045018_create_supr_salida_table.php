<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuprSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('SUPR_SALIDA', function (Blueprint $table) {
        //     $table->bigIncrements('COD_SUPR_SALIDA');
        //     $table->unsignedBigInteger('COD_SALIDA');
        //     $table->unsignedBigInteger('COD_USUARIO');

        //     $table->foreign('COD_USUARIO')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('COD_SALIDA')->references('COD_SALIDA')->on('SALIDAS')->onDelete('cascade');
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
        // Schema::dropIfExists('SUPR_SALIDA');
    }
}
