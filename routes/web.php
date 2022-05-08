<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstudiantesController as EstudiantesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/estudiantes', [EstudiantesController::class,'index'])->name('estudiantes.index');
Route::get('/estudiantes/create', [EstudiantesController::class,'create'])->name('estudiantes.create');
Route::post('/estudiantes/store', [EstudiantesController::class,'store'])->name('estudiantes.store');
Route::get('/estudiantes/{id}/edit', [EstudiantesController::class,'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{id}/update', [EstudiantesController::class,'update'])->name('estudiantes.update');
Route::delete('/estudiantes/{id}/destroy', [EstudiantesController::class,'destroy'])->name('estudiantes.destroy');