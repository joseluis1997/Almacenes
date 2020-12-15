<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UNIDADES', function (Blueprint $table) {
            $table->bigIncrements('COD_UNIDAD');

            $table->unsignedBigInteger('COD_DIRECCION')->unique();

            $table->foreign('COD_DIRECCION')->references('COD_DIRECCION')->on('DIRECCIONES')->onDelete('cascade');

            $table->string('NOM_UNIDAD',100)->unique();
            $table->string('UBICACION');
            $table->string('DESC_UNIDAD')->nullable();
            $table->boolean('ESTADO_UNIDAD')->default(true);
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
        Schema::dropIfExists('UNIDADES');
    }
}
