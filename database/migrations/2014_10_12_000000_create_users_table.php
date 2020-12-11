<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('CI');
            $table->string('NOMBRE',50)->unique();
            $table->string('APELLIDO', 50); 
            $table->string('TELEFONO');
            $table->string('NOM_USUARIO',50)->unique();
            $table->string('password', 100);
            $table->boolean('ESTADO_USUARIO')->default(true);
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
        Schema::dropIfExists('users');
    }

    
}
