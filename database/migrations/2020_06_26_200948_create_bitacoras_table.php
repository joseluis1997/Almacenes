<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BITACORAS', function (Blueprint $table) {
            $table->bigIncrements('COD_BITACORAS');
            $table->unsignedBigInteger('usuario_id');
            $table->string('accion');
            $table->date('fecha');
            $table->string('tabla');
            $table->string('consulta_sql');
            $table->timestamps();
            // relacionando tabla botacoras con tabla usuario
            $table->foreign('usuario_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BITACORAS');
    }
}
