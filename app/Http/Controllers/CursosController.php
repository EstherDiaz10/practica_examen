<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Etiqueta;

class CursosController extends Controller
{
    public function index() {

        $cursos = Curso::all();

        return view('cursos.listadoCursos', compact('cursos'));
    }

    public function edit($id) {

        return view('cursos.editarCurso', compact('id'));
    }

    public function crear() {

        return view('cursos.crearCurso');
    }

    public function create(Request $request) {
        
        $data = $request->validate([
            'titulo' => 'required|max:40',
            'descripcion' => 'required',
        ]);

        Curso::create([
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'user_id' => auth()->id()
            ]);

        return redirect()->route('listadoCursos');
    }

    public function actualizar(Request $request, $id) {

        $data = $request->validate([
            'titulo' => 'required|max:40',
            'descripcion' => 'required',
        ]);

        $curso = Curso::findOrFail($id);
        $curso->titulo = $data['titulo'];
        $curso->descripcion = $data['descripcion'];
        $curso->update();

        return redirect()->route('listadoCursos');
    }

    public function add() {

        $cursos = Curso::all();
        $etiquetas = Etiqueta::all();

        return view('cursos.addEtiqueta', compact('cursos', 'etiquetas'));
    }

    public function addEtiqueta(Request $request) {

        $curso = Curso::findOrFail($request->curso);
        $cursos = Curso::all();
        $etiqueta = $curso->etiquetas()->attach($request->etiqueta);

        return view('cursos.listadoCursos', compact('cursos'));
    }
    
}
