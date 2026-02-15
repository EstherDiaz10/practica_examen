<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
</head>
<body>

    @auth 
        <h1>Bienvenido, {{ auth()->user()->name }}</h1>

        <form method="POST" action="{{ route('crearProyecto') }}">
            @csrf   
            <input type="text" name="nombre" placeholder="Nombre del proyecto" required>
            <textarea name="descripcion" placeholder="Descripción" required></textarea>
            <button type="submit">Crear proyecto</button>
        </form>
    @endauth

    <h2>Listado proyectos</h2>
        
        @foreach ($proyectos as $proyecto)
            <h6>{{ $proyecto->nombre }}</h6>
            @auth
                <form method="POST" action="{{ route('proyectosDesarrolladores', $proyecto->id) }}">
                    @csrf
                    <button type="submit">Ver desarrolladores</button>
                </form>
                <form method="POST" action="{{ route('borrarProyecto', $proyecto->id) }}">
                    @csrf
                    @method ('DELETE')
                    <button type="submit">Borrar</button>
                </form>
                @if (count($desarrolladores) > 0 && $id_proyecto == $proyecto->id)
                <ul>
                    @foreach ($desarrolladores as $desarrollador)
                        <li>{{ $desarrollador->nombre }}</li>
                    @endforeach
                </ul>
                @endif
            @endauth

        @endforeach
    

    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf   
            <button type="submit">Cerrar sesión</button>
        </form>
    @endauth

</body>
</html>