<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Estudiante;

class EstudiantesController extends Controller
{
    public function index() {
        $estudiantes = Estudiante::all();
        $argumentos = array();
        $argumentos['estudiantes'] = $estudiantes;
        return view("estudiantes.index", $argumentos);
    }

    public function create() {
        return view('estudiantes.create');
    }

    public function store(Request $request) {
        $nuevoEstudiante = new Estudiante();
        $nuevoEstudiante->nombre = $request->input('nombre');
        $nuevoEstudiante->matricula = $request->input('matricula');
        $nuevoEstudiante->carrera = $request->input('carrera');
        $nuevoEstudiante->promedio = $request->input('promedio');

        if ($request->file('foto')) {
            $path_foto = $request->file('foto')->store('public/fotos');
            if ($path_foto) {
                $nuevoEstudiante->foto = $request->file('foto')->hashName();
            }
        }

        if($nuevoEstudiante->save()) {
            return redirect()->route('estudiantes.index')->with('exito', 'estudiante creado con exito');;
        }
        return redirect()->route('estudiantes.create')->with('exito', 'estudiante creado con exito');
    }

    public function edit($id) {
        $estudiante = Estudiante::find($id);

        if ($estudiante){
            $argumentos = array();
            $argumentos['estudiante'] = $estudiante;
            return view('estudiantes.edit', $argumentos);
        }
        return redirect()->route('estudiantes.index')->with('error', 'No existe el estudiante');
    }

    public function update($id, Request $request) {
        $estudiante = Estudiante::Find($id);
        if ($estudiante){
            $estudiante->nombre = $request->input('nombre');
            $estudiante->matricula = $request->input('matricula');
            $estudiante->carrera = $request->input('carrera');
            $estudiante->promedio = $request->input('promedio');

            if ($request->file('foto')) {
                $path_foto = $request->file('foto')->store('public/fotos');
                if ($path_foto) {
                    $estudiante->foto = $request->file('foto')->hashName();
                }
            }

            if ($estudiante->save()) {
                return redirect()->route('estudiantes.index', $estudiante->id)->with('exito', 'Se actualizo correctamente el estudiante');
            }

            return edirect()->route('estudiantes.edit', $estudiante->id)->with('error', 'No se pudo actualizar');
        }

        return redirect()->route('estudiantes.index')->with('error', 'No existe el estudiante');
    }

    public function destroy($id) {
        $estudiante = Estudiante::find($id);
        if ($estudiante) {
            if($estudiante->delete()) {
                return redirect()->route('estudiantes.index')->with('exito', 'estudiante eliminado');
            }
            return redirect()->route('estudiantes.index')->with('error', 'No se encontro al estudiante');
        }
        return redirect()->route('estudiantes.index')->with('error', 'No se encontro al estudiante');
    }
}
