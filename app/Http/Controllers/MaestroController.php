<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\catCursos;
use App\catGradoAcademico;
use App\datMaestro;

class MaestroController extends Controller
{
    public function index(){
        $maestros = \DB::table('maestros_view')->get();
        return view('maestros')->with('maestros', $maestros);
    }

    public function indexCreate(){
        $grados_academicos = catGradoAcademico::all();
        return view('nuevo_maestro')->with('grados', $grados_academicos);
    }

    public function indexEdit($id){
        $grados_academicos = catGradoAcademico::all();
        $maestro= datMaestro::find($id);
        return view('edit_maestro')->with('grados', $grados_academicos)->with('maestro', $maestro);
    }

    public function indexDelete($id) {
        $grados_academicos = catGradoAcademico::all();
        $maestro= datMaestro::find($id);
        return view('delete_maestro')->with('grados', $grados_academicos)->with('maestro', $maestro);
    }
    public function handleEdit(Request $request) {
        $data= $request->validate([
            'matricula' => 'required|integer',
            'nombre' => 'required|max:255',
            'paterno' => 'required|max:255',
            'materno' => 'required|max:255',
            'curp' => 'required|max:18',
            'idGradoAca' => 'required|exists:cat_grado_academicos,idGradoAca',
            'idMaestro' => 'required|exists:dat_maestros,idMaestro'
        ]);
        $maestro = datMaestro::find($data['idMaestro']);
        $maestro->matricula = $data['matricula'];
        $maestro->nombre = $data['nombre'];
        $maestro->paterno = $data['paterno'];
        $maestro->materno = $data['materno'];
        $maestro->curp = $data['curp'];
        $maestro->idGradoAca = $data['idGradoAca'];
        $maestro->save();
        return redirect("/maestros");
    }
    public function handleDelete(Request $request){
        $data= $request->validate([
            'idMaestro' => 'required|exists:dat_maestros,idMaestro'
        ]);
        datMaestro::destroy($data['idMaestro']);
        return redirect("/maestros");
    }

    public function nuevoMaestro(Request $request) {
        $data= $request->validate([
            'matricula' => 'required|integer',
            'nombre' => 'required|max:255',
            'paterno' => 'required|max:255',
            'materno' => 'required|max:255',
            'curp' => 'required|max:18',
            'idGradoAca' => 'required|exists:cat_grado_academicos,idGradoAca',
        ]);
        \DB::select('call create_maestro(?,?,?,?,?,?)', [$data['matricula'], $data['nombre'], $data['paterno'], $data['materno'], $data['curp'], $data['idGradoAca']]);
        return redirect("/maestros");
    }
}
