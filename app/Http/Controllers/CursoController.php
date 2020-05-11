<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\catCursos;

class CursoController extends Controller
{
    public function index(){
        $cursos = \DB::table('cursos_actuales')->get();
        $cursos_vencidos = \DB::table('cat_cursos')->where('vigente',0)->get();
        return view('cursos')->with('cursos', $cursos)->with('cursos_vencidos', $cursos_vencidos);
    }

    public function indexCreate(){
        return view('nuevo_curso');
    }

    public function indexEdit($id){
        $curso = catCursos::find($id);
        return view('edit_curso')->with('curso', $curso);
    }

    public function indexDelete($id) {
        $curso = catCursos::find($id);
        return view('delete_curso')->with('curso', $curso);
    }
    public function handleEdit(Request $request) {
        $data= $request->validate([
            'idCurso' => 'required|exists:cat_cursos,idCurso',
            'nombreCurso' => 'required|max:255',
            'fechaAlta' => 'required|date',
            'fechaBaja' => 'required|date',
            'vigente' => 'required|boolean'
        ]);
        $curso = catCursos::find($data['idCurso']);
        $curso->nombreCurso = $data['nombreCurso'];
        $curso->fechaAlta = $data['fechaAlta'];
        $curso->fechaBaja = $data['fechaBaja'];
        $curso->vigente = $data['vigente'];
        $curso->save();
        return redirect("/cursos");
    }
    public function handleDelete(Request $request){
        $data= $request->validate([
            'idCurso' => 'required|exists:cat_cursos,idCurso',
        ]);
        catCursos::destroy($data['idCurso']);
        return redirect("/cursos");
    }

    public function nuevoCurso(Request $request) {
        $data= $request->validate([
            'nombreCurso' => 'required|max:255',
            'fechaAlta' => 'required|date',
            'fechaBaja' => 'required|date',
            'vigente' => 'required|boolean'
        ]);
        \DB::select('call create_curso(?,?,?,?)', [$data['nombreCurso'], $data['fechaAlta'], $data['fechaBaja'], $data['vigente']]);
        return redirect("/cursos");
    }
}
