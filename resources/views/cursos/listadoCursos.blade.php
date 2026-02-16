<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado cursos</title>
</head>
<body>
    <ul>
        @forelse ($cursos as $curso)
        <li>
            {{$curso->titulo}}: {{$curso->descripcion}}

            <a href="{{ route('editarCurso', $curso->id) }}">Editar</a>
        </li>

        @empty
            <h4>No hay nada que mostrar</h4>
        @endforelse
        @auth
            <form method="get" action="{{ route('crear') }}">
                
                <button type="submit">Crear curso</button>
            </form>
            <form method="get" action="{{ route('anyadirEtiqueta') }}">
                
                <button type="submit">Añadir etiqueta</button>
            </form>
            <br><br>
            <form method="POST" action="{{ route('logout') }}">
                @csrf   
                <button type="submit">Cerrar sesión</button>
        </form>
        @endauth
    </ul>
    
</body>
</html>