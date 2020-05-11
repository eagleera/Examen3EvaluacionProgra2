<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE PROCEDURE create_curso( IN nombre varchar(255), IN fechaAlta datetime, IN fechaBaja datetime, IN vigente boolean)  BEGIN 
            insert into cat_cursos(nombreCurso, fechaAlta, fechaBaja, vigente) values (nombre, fechaAlta, fechaBaja, vigente);
        END');
        DB::unprepared('CREATE PROCEDURE create_maestro( IN matricula integer, IN nombre varchar(255), IN paterno varchar(255), IN materno varchar(255), IN curp varchar(255), IN idGradoAca integer) BEGIN 
            insert into dat_maestros(matricula, nombre, paterno, materno, curp, idGradoAca) values (matricula, nombre, paterno, materno, curp, idGradoAca);
        END');
        DB::unprepared('CREATE PROCEDURE link_maestro_curso( IN idCurso integer, IN idMaestro integer) BEGIN 
            insert into rel_maestro_cursos(idCurso, idMaestro) values (idCurso, idMaestro);
        END');
        
        DB::statement("CREATE VIEW cursos_actuales AS SELECT * from cat_cursos where vigente = true");
        DB::statement("CREATE VIEW maestros_view AS SELECT dat_maestros.*, cat_grado_academicos.gradoAcademico from dat_maestros INNER JOIN cat_grado_academicos ON dat_maestros.idGradoAca = cat_grado_academicos.idGradoAca");
        DB::statement("CREATE VIEW maestros_cursos AS SELECT CONCAT(dat_maestros.nombre, ' ', dat_maestros.paterno, ' ', dat_maestros.materno) AS maestroNombreCompleto, cat_cursos.nombreCurso, cat_cursos.idCurso, dat_maestros.matricula, dat_maestros.idMaestro from rel_maestro_cursos INNER JOIN dat_maestros ON rel_maestro_cursos.idMaestro = dat_maestros.idMaestro RIGHT OUTER JOIN cat_cursos ON rel_maestro_cursos.idCurso = cat_cursos.idCurso where cat_cursos.vigente = true");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS create_curso');
        DB::unprepared('DROP PROCEDURE IF EXISTS create_maestro');
        DB::unprepared('DROP PROCEDURE IF EXISTS link_maestro_curso');
        DB::statement('DROP VIEW IF EXISTS cursos_actuales');
        DB::statement('DROP VIEW IF EXISTS maestros_view');
        DB::statement('DROP VIEW IF EXISTS maestros_cursos');
    }
}
