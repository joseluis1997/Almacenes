<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MEDIDA', function (Blueprint $table) {
            $table->bigIncrements('COD_MEDIDA');
            $table->string('NOM_MEDIDA',50);
            $table->text('DESC_MEDIDA');
            $table->boolean('ESTADO_MEDIDA')->default(true);
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
        Schema::dropIfExists('MEDIDA');
    }
}
