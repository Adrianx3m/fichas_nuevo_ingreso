<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosEscolaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_escolares', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_escuela', 50);
            $table->string('clave_escuela', 15);
            $table->string('estado_procedencia', 20);
            $table->string('municipio_procedencia', 50);
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso');
            $table->integer('promedio');
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
        Schema::dropIfExists('datos_escolares');
    }
}
