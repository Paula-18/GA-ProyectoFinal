<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Estudiante;

class EstudiantesController extends Controller
{
    public function index() {
        $estudiantes = Estudiante::select('id', 'nombre', 'matricula')->get();
        return $estudiantes;
    }

    public function show($id) {
        $estudiante = Estudiante::select('id', 'carrera', 'promedio', 'foto')->where('id', $id)->first();
        return $estudiante;
    }
}