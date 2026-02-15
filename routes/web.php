<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectosController;
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

require __DIR__.'/auth.php';
