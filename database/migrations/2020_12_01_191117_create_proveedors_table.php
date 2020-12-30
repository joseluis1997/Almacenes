<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PROVEEDORES', function (Blueprint $table) {
            $table->bigIncrements('COD_PROVEEDOR');
            $table->bigInteger('NIT');
            $table->string('NOM_PROVEEDOR',255);
            $table->string('DIR_PROVEEDOR', 255)->nullable();
            $table->bigInteger('TELEF_PROVEEDOR')->nullable();
            $table->boolean('ESTADO_PROVEEDOR')->default(true);
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
        Schema::dropIfExists('PROVEEDORES');
    }
}
