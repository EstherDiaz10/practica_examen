<?php

namespace App\Http\Controllers;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function listarProyectos() {

        $proyectos = Proyecto::all();
        $desarrolladores = [];

        return view('proyectos.listadoProyectos', compact('proyectos', 'desarrolladores'));
    }

    public function borrarProyecto($id) {

        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('listadoProyectos');
    }

    public function crearProyecto(Request $request) {

        $data = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
        ]);

        Proyecto::create($data);

        return redirect()->back();
    }

    public function proyectosDesarrolladores($id) {

        $proyectos = Proyecto::all();
        $proyecto = Proyecto::findOrFail($id);
        $desarrolladores = $proyecto->desarrolladores;
        $id_proyecto = $id;

        return view('proyectos.listadoProyectos', compact('proyectos', 'desarrolladores', 'id_proyecto'));
    }
}