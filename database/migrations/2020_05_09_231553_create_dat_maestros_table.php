<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatMaestrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dat_maestros', function (Blueprint $table) {
            $table->bigIncrements('idMaestro');
            $table->integer('matricula');
            $table->string('paterno');
            $table->string('materno');
            $table->string('nombre');
            $table->string('curp');
            $table->foreignId('idGradoAca');
            $table->foreign('idGradoAca')->references('idGradoAca')->on('cat_grado_academicos');
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
        Schema::dropIfExists('dat_maestros');
    }
}
