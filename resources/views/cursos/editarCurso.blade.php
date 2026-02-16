<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @if ($errors->any())
        <div>
            <strong>Whoops!</strong>There were some problems with your input. <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('actualizarCurso', $id) }}">
        @method('PATCH')
        @csrf

        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo">

        <label for="descripcion">Descripción: </label>
        <input type="text" name="descripcion">

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>