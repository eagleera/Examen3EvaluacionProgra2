<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\catCursos;
use App\datMaestro;
use App\relMaestroCurso;

class MaestroCursosController extends Controller
{
    public function index(){
        $cursos_maestros = \DB::table('maestros_cursos')->get();
        $grupo = [];
        foreach ($cursos_maestros as $curso) {
            $grupo[$curso->idCurso][] = $curso;
        }
        return view('welcome')->with('cursos', $grupo);
    }

    public function indexCreate($id){
        $curso = catCursos::find($id);
        $cursos_maestros = \DB::table('maestros_cursos')->where('idCurso', $id)->whereNotNull('idMaestro')->pluck('idMaestro');
        $maestros = datMaestro::whereNotIn('idMaestro',$cursos_maestros)->get();
        return view('nuevo_maestro_curso')->with('curso', $curso)->with('maestros', $maestros);
    }

    public function indexDelete($idCurso, $idMaestro) {
        $maestro = datMaestro::find($idMaestro);
        $curso = catCursos::find($idCurso);
        return view('delete_maestro_curso')->with('curso', $curso)->with('maestro', $maestro);
    }

    public function handleDelete(Request $request){
        $data= $request->validate([
            'idCurso' => 'required|exists:cat_cursos,idCurso',
            'idMaestro' => 'required|exists:dat_maestros,idMaestro'
        ]);
        relMaestroCurso::where(['idCurso'=> $data['idCurso'], 'idMaestro' => $data['idMaestro']])->delete();
        return redirect("/");
    }

    public function agregarMaestroCurso(Request $request) {
        $data= $request->validate([
            'idCurso' => 'required|exists:cat_cursos,idCurso',
            'idMaestro' => 'required|exists:dat_maestros,idMaestro'
        ]);
        \DB::select('call link_maestro_curso(?,?)', [$data['idCurso'], $data['idMaestro']]);
        return redirect("/");
    }
}
