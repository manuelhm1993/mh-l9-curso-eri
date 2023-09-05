<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games - Main</title>
</head>
<body>
    <h1>Vista creada en blade y llamada desde el GameController</h1>
    <h2>Listado de juegos</h2>

    <ul>
        {{-- Forelse, útil para agregar condiciones aplicadas a un bucle --}}
        @forelse ($games as $game)
            <li>{{ $game }}</li>
        @empty
            <li>No hay juegos disponibles</li>
        @endforelse
    </ul>
</body>
</html>
