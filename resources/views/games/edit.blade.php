<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games - Edit</title>
</head>
<body>
    <h1>Formulario de actualización de video juegos</h1>

    <p>
        <a href="{{ route('games.index') }}">Ver juegos</a>
    </p>

    <form action="{{ route('games.update', $video_game->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" placeholder="Nombre" name="name" value="{{ $video_game->name }}" required>

        <select name="category_id" required>
            @foreach ($categories as $category)
                @if ($category->id === $video_game->category_id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>

        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>
