<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelMaestroCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_maestro_cursos', function (Blueprint $table) {
            $table->bigIncrements('idMaestroCurso');
            $table->foreignId('idMaestro');
            $table->foreign('idMaestro')->references('idMaestro')->on('dat_maestros');
            $table->foreignId('idCurso');
            $table->foreign('idCurso')->references('idCurso')->on('cat_cursos');
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
        Schema::dropIfExists('rel_maestro_cursos');
    }
}
