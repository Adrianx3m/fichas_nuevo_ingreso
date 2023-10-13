<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomicilioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->string('calle_nombre',50);
            $table->integer('num_exterior');
            $table->integer('num_interior');
            $table->integer('codigo_postal');
            $table->string('estado',50);
            $table->string('municipio',50);
            $table->string('localidad',50);
            $table->string('telefono',11);
            $table->string('correo',50);
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
        Schema::dropIfExists('domicilio');
    }
}
