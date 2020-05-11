<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_cursos', function (Blueprint $table) {
            $table->bigIncrements('idCurso');
            $table->string('nombreCurso');
            $table->dateTime('fechaAlta');
            $table->dateTime('fechaBaja');
            $table->boolean('vigente');
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
        Schema::dropIfExists('cat_cursos');
    }
}
