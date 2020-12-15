<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecretariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SECRETARIAS', function (Blueprint $table) {
            $table->bigIncrements('COD_SECRETARIA');

            $table->unsignedBigInteger('COD_ESTRUCTURA_G')->unique();

            $table->foreign('COD_ESTRUCTURA_G')->references('COD_ESTRUCTURA_G')->on('ESTRUCTURA_G')->onDelete('cascade');

            $table->string('NOM_SECRETARIA',100)->unique();
            $table->string('UBICACION');
            $table->string('DESC_SECRETARIA')->nullable();
            $table->boolean('ESTADO_SECRETARIA')->default(true);
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
        Schema::dropIfExists('SECRETARIAS');
    }
}
