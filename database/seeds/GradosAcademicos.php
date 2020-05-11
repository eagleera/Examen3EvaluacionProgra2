<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GradosAcademicos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_grado_academicos')->insert([
            [
                'gradoAcademico' => "Primaria trunca",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'gradoAcademico' => "Primaria",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'gradoAcademico' => "Secundaria trunca",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')   
            ],
            [
                'gradoAcademico' => "Secundaria",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'gradoAcademico' => "Preparatoria trunca",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'gradoAcademico' => "Preparatoria",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'gradoAcademico' => "Técnico",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'gradoAcademico' => "Técnico universitario",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'gradoAcademico' => "Carrera trunca",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'gradoAcademico' => "Licenciatura",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'gradoAcademico' => "Maestría",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'gradoAcademico' => "Doctorado",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
