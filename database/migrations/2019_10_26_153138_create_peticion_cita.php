<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeticionCita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('peticion_citas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('Direccion');
            $table->integer('Telefono');
            $table->date('FechaFumigacion');
            $table->time('Hora');
            $table->unsignedInteger("Estado_id");
            $table->foreign("Estado_id")->references("id")->on("estados");
            $table->unsignedInteger("User_id");
            $table->foreign("User_id")->references("id")->on("users");
            $table->timestamps();

        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peticion_citas');
        //
    }
}
