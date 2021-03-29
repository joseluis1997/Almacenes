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
            $table->string('CI')->unique();
            $table->string('NOMBRES', 40)->unique();
            $table->string('APELLIDOS',40); 
            $table->integer('TELEFONO');
            $table->string('NOM_USUARIO',20)->unique();
            $table->string('password');
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
