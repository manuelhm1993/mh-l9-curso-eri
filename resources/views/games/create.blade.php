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

        {{-- Agregar la directiva error en caso de que exista error de validación --}}
        <input type="text" placeholder="Nombre" name="name">

        @error('name')
            {{ $message }}
        @enderror

        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        @error('category_id')
            {{ $message }}
        @enderror

        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>
