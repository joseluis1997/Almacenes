<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuprConsumoDirectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SUPR_CONSUMO_DIRECTO', function (Blueprint $table) {
            // $table->bigIncrements('COD_SUPR_CONSUMO_DIRECTO');

            $table->unsignedBigInteger('COD_CONSUMO_DIRECTO');

            $table->foreign('COD_CONSUMO_DIRECTO')->references('COD_CONSUMO_DIRECTO')->on('CONSUMO_DIRECTOS')->onDelete('cascade');
            
            $table->unsignedBigInteger('COD_USUARIO');
            $table->foreign('COD_USUARIO')->references('id')->on('users')->onDelete('cascade');

            $table->date('FECHA');
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
        Schema::dropIfExists('SUPR_CONSUMO_DIRECTO');
    }
}
