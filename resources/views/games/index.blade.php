<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games - Inicio</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Vista creada en blade y llamada desde el GameController</h1>

    <p>
        <a href="{{ route('games.create') }}">Nuevo juego</a>
    </p>

    <h2>Listado de juegos</h2>

    <table>
        <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Nombre</th>
                <th scope="row">Categoría</th>
                <th scope="row">Creado</th>
                <th scope="row">Disponible</th>
            </tr>
        </thead>

        <tbody>
        {{-- Forelse, útil para agregar condiciones aplicadas a un bucle --}}
        @forelse ($games as $game)
            <tr>
                <td>{{ $game->id }}</td>
                <td>{{ $game->name }}</td>
                <td>{{ $game->category->name }}</td>
                <td>{{ date('d/m/Y', strtotime($game->created_at)) }}</td>
                <td>
                    @if ($game->active)
                        <span style='color:green'>Si</span>
                    @else
                        <span style='color:red'>No</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td>No hay juegos disponibles</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
