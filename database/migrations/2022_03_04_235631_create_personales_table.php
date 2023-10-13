<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('a_paterno', 50);
            $table->string('a_materno', 50);
            $table->string('sexo', 20);
            $table->date('fecha_nac');
            $table->string('nacionalidad', 50);
            $table->string('estado',50);
            $table->string('municipio',50);
            $table->string('curp', 50);
            $table->string('estado_civil',50);
            $table->string('tipo_sangre',30);
            $table->string('se_entero_por',80);
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
        Schema::dropIfExists('personales');
    }
}
