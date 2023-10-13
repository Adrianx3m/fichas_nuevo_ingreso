<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocioeconomicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socioeconomicos', function (Blueprint $table) {
            $table->id();
            $table->string('estudios_padre', 50);
            $table->string('estudios_madre', 50);
            $table->string('vive_con', 30);
            $table->string('ocupacion_padre', 80);
            $table->string('ocupacion_madre', 80);
            $table->string('depende', 50);
            $table->integer('ingreso_mensual');
            $table->string('casa', 20);
            $table->integer('cuartos');
            $table->integer('num_habitantes');
            $table->integer('num_dependen');
            $table->string('tiene_beca', 3);
            $table->string('beca_otorgo',50);
            $table->string('contacto_emergencia', 80);
            $table->string('calle_contacto_emergencia', 80);
            $table->string('colonia', 80);
            $table->integer('codigo_postal');
            $table->string('municipio', 80);
            $table->string('estado', 80);
            $table->string('telefono_emergencia',11);
            $table->string('lugar_trabajo', 50);
            $table->string('telefono_trabajo',11);
            $table->string('capacidad_diferente',3);
            $table->string('cual_capacidad',30);
            $table->string('bienestar',3);
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
        Schema::dropIfExists('socioeconomicos');
    }
}
