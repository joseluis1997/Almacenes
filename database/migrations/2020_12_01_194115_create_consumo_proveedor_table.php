<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumoProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('CONSUMO_PROVEEDOR', function (Blueprint $table) {
        //     $table->bigIncrements('COD_CONSUMO_PROVEEDOR');

        //     $table->unsignedBigInteger('COD_PROVEEDOR');
        //     $table->unsignedBigInteger('COD_CONSUMO_DIRECTO');

        //     $table->foreign('COD_PROVEEDOR')->references('COD_PROVEEDOR')->on('PROVEEDORES')->onDelete('cascade');

        //     $table->foreign('COD_CONSUMO_DIRECTO')->references('COD_CONSUMO_DIRECTO')->on('CONSUMO_DIRECTOS')->onDelete('cascade');

        //     $table->boolean('ESTADO')->default(true);
            
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('CONSUMO_PROVEEDOR');
    }
}
