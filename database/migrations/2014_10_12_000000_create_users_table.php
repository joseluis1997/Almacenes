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
            $table->string('NOMBRE')->unique();
            $table->string('APELLIDO');
            $table->string('TELEFONO');
            $table->string('NOM_USUARIO')->unique();
            $table->string('password');
            $table->boolean('ESTADO_USUARIO')->default(true);
            $table->timestamps();

            // $table->bigIncrements('id');
            // $table->string('ci');
            // $table->string('name')->unique();
            // $table->string('lastname');
            // $table->string('telephone');
            // $table->string('username')->unique();
            // $table->string('password');
            // $table->boolean('ESTADO_USUARIO')->default(true);
            // $table->timestamps();
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
