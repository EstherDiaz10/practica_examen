<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\CursosController;
use Illuminate\Support\Facades\Route;

Route::get('/listadoProyectos', [ProyectosController::class, 'listarProyectos'])->name('listadoProyectos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::post('/proyectosDesarrolladores/{id}', [ProyectosController::class, 'proyectosDesarrolladores'])->name('proyectosDesarrolladores');
    Route::delete('/borrar/{id}', [ProyectosController::class, 'borrarProyecto'])->name('borrarProyecto');
    Route::post('/crear', [ProyectosController::class, 'crearProyecto'])->name('crearProyecto');
});


Route::get('/listadoCursos', [CursosController::class, 'index'])->name('listadoCursos');

Route::middleware('auth')->group(function () {
    Route::get('/editarCurso/{id}', [CursosController::class, 'edit'])->name('editarCurso');
    Route::patch('/actualizar/{id}', [CursosController::class, 'actualizar'])->name('actualizarCurso');
    Route::get('/anyadirEtiqueta', [CursosController::class, 'add'])->name('anyadirEtiqueta');
    Route::post('/addEtiqueta', [CursosController::class, 'addEtiqueta'])->name('addEtiqueta');
    Route::get('/listadoCursos/crear', [CursosController::class, 'crear'])->name('crear');
    Route::post('/crearCurso', [CursosController::class, 'create'])->name('crearCurso');
});

require __DIR__.'/auth.php';
