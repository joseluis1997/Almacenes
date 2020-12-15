<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DIRECCIONES', function (Blueprint $table) {
            $table->bigIncrements('COD_DIRECCION');
            $table->unsignedBigInteger('COD_SECRETARIA')->unique();

            $table->foreign('COD_SECRETARIA')->references('COD_SECRETARIA')->on('SECRETARIAS')->onDelete('cascade');

            $table->string('NOM_DIRECCION',100)->unique();
            $table->string('UBICACION');
            $table->string('DESC_DIRECCION')->nullable();
            $table->boolean('ESTADO_DIRECCION')->default(true);
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
        Schema::dropIfExists('DIRECCIONES');
    }
}
