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
        Schema::create('ESTRUCTURA_G', function (Blueprint $table) {
            $table->bigIncrements('COD_ESTRUCTURA_G');
            $table->string('NOM_ESTRUCTURA_G',100)->unique();
            $table->string('UBICACION');
            $table->string('DESC_ESTRUCTURA_G')->nullable();
            $table->boolean('ESTADO_ESTRUCTURA_G')->default(true);
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
        Schema::dropIfExists('ESTRUCTURA_G');
    }
}
