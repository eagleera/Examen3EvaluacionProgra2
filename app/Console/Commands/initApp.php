<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class initApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inicializa la aplicación con datos dummy';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Empezando migración de base de datos");
        \Artisan::call('migrate:refresh --seed');
        $this->info("Migración de base de datos completada");
        $this->info("Llenando datos dummy...");
        \DB::table('cat_cursos')->insert([
            [
                'nombreCurso' => "Pintura",
                'fechaAlta' => Carbon::now()->format('Y-m-d H:i:s'),
                'fechaBaja' => Carbon::now()->endOfWeek()->format('Y-m-d H:i:s'),
                'vigente' => 1
            ],
            [
                'nombreCurso' => "Artes marciales",
                'fechaAlta' => Carbon::now()->format('Y-m-d H:i:s'),
                'fechaBaja' => Carbon::now()->endOfWeek()->format('Y-m-d H:i:s'),
                'vigente' => 1
            ],
            [
                'nombreCurso' => "Yoga",
                'fechaAlta' => Carbon::now()->format('Y-m-d H:i:s'),
                'fechaBaja' => Carbon::now()->endOfWeek()->format('Y-m-d H:i:s'),
                'vigente' => 1
            ],
            [
                'nombreCurso' => "Ajedrez",
                'fechaAlta' => Carbon::now()->format('Y-m-d H:i:s'),
                'fechaBaja' => Carbon::now()->endOfWeek()->format('Y-m-d H:i:s'),
                'vigente' => 0
            ],
        ]);
        \DB::table('dat_maestros')->insert([
            [
                'nombre' => "Linda",
                'paterno' => "Terrazas",
                'materno' => "Monarrez",
                'CURP' => 'AECJ940429HCHRRS01',
                'matricula' => '4510',
                'idGradoAca' => 10
            ],
            [
                'nombre' => "Hilda",
                'paterno' => "Terrazas",
                'materno' => "Monarrez",
                'CURP' => 'AIHP911101MCHRRR03',
                'matricula' => '4511',
                'idGradoAca' => 9
            ],
            [
                'nombre' => "Daniel",
                'paterno' => "Aguilera",
                'materno' => "Terrazas",
                'CURP' => 'BAVC840614HCHRLR04',
                'matricula' => '4300',
                'idGradoAca' => 9
            ],
            [
                'nombre' => "Pedro",
                'paterno' => "Vidal",
                'materno' => "Cazuelas",
                'CURP' => 'CAMJ900421HCHRRN05',
                'matricula' => '4349',
                'idGradoAca' => 11
            ]
        ]);
        \DB::table('rel_maestro_cursos')->insert([
            [
                'idMaestro' => 1,
                'idCurso' => 1
            ],
            [
                'idMaestro' => 1,
                'idCurso' => 2
            ],
            [
                'idMaestro' => 2,
                'idCurso' => 2
            ],
            [
                'idMaestro' => 3,
                'idCurso' => 1
            ],
            [
                'idMaestro' => 4,
                'idCurso' => 2
            ],
            [
                'idMaestro' => 1,
                'idCurso' => 4
            ],
            [
                'idMaestro' => 3,
                'idCurso' => 3
            ],
        ]);
        $this->info("Aplicación inicializada");
    }
}
