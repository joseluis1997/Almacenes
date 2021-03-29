<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ARTICULO', function (Blueprint $table) {
            $table->bigIncrements('COD_ARTICULO');
            
            $table->unsignedBigInteger('FK_COD_PARTIDA');
            $table->foreign('FK_COD_PARTIDA')->references('COD_PARTIDA')->on('PARTIDA')->onDelete('cascade');

            $table->unsignedBigInteger('FK_COD_MEDIDA');

            
            $table->foreign('FK_COD_MEDIDA')->references('COD_MEDIDA')->on('MEDIDA')->onDelete('cascade');
            
            $table->string('NOM_ARTICULO',40)->unique();
            $table->string('DESC_ARTICULO')->nullable();
            $table->decimal('CANT_ACTUAL', 10, 2)->default('0');
            $table->string('MARCA',40)->unique();
            $table->boolean('ESTADO_ARTICULO')->default(true);
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
        Schema::dropIfExists('ARTICULO');
    }
}
