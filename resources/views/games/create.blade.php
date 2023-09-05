<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games - Create</title>
</head>
<body>
    <h1>Formulario de creación de video juegos</h1>

    <p>
        <a href="{{ route('games.index') }}">Ver juegos</a>
    </p>

    <form action="{{ route('games.store') }}" method="POST">
        @csrf

        <input type="text" placeholder="Nombre" name="name" required>

        <select name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>
