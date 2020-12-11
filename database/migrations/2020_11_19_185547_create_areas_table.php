<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AREA', function (Blueprint $table) {
            $table->bigIncrements('COD_AREA');
            // $table->unsignedBigInteger('NUM_AREA');
            $table->string('NOM_AREA')->unique();
            $table->string('UBICACION');
            $table->string('DESC_AREA')->nullable();
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
        Schema::dropIfExists('AREA');
    }
}
