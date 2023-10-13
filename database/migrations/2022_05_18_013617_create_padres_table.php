<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padres', function (Blueprint $table) {
            $table->id();
            $table->string('apellido_paterno_padre', 50);
            $table->string('apellido_materno_padre', 50);
            $table->string('nombre_padre', 50);
            $table->string('vivo_padre', 5);
            $table->string('apellido_paterno_madre', 50);
            $table->string('apellido_materno_madre', 50);
            $table->string('nombre_madre', 50);
            $table->string('vivo_madre', 5);
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('padres');
    }
}
