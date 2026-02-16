<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir etiquetas</title>
</head>
<body>
    <form method="post" action="{{ route('addEtiqueta') }}">
        @csrf
        <label for="curso">Selecciona curso: </label>
        <select name="curso">
            @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->titulo }}</option>
            @endforeach
        </select>

        <label for="etiqueta">Añadir etiqueta: </label>
        <select name="etiqueta">
            @foreach ($etiquetas as $etiqueta)
                <option value="{{ $etiqueta->id }}">{{ $etiqueta->nombre }}</option>
            @endforeach
        </select>
        
        <button type="submit">Añadir</button>
    </form>
</body>
</html>