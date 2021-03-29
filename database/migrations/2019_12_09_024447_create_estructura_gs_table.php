<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstructuraGsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AREAS', function (Blueprint $table) {
            $table->bigIncrements('COD_AREA');

            $table->unsignedBigInteger('AREA_PADRE')->nullable();
            $table->foreign('AREA_PADRE')->references('COD_AREA')->on('AREAS');

            $table->string('NOM_AREA')->unique();
            $table->string('UBICACION_AREA')->nullable();
            $table->text('DESC_AREA')->nullable();
            $table->boolean('ESTADO_AREA')->default(true);
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
        Schema::dropIfExists('AREAS');
    }
}
