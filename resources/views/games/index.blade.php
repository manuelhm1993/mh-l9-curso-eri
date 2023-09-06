<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games - Inicio</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Simular un link --}}
    <style>
        .link {
            text-decoration: underline;
            color: rgb(0, 0, 238);
            cursor: pointer;
        }

        .link:active {
            color: rgb(255, 0, 0);
        }
    </style>
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
                <th scope="row">Acciones</th>
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
                <td>
                    <a href="{{ route('games.show', $game->id) }}">Ver</a>
                    <a href="{{ route('games.edit', $game->id) }}">Editar</a>

                    {{-- Simular un link con un span y ejecutar un formlario desde afuera --}}
                    <span class="link" role="button" data-eliminar-submit="{{ $game->id }}">
                        Eliminar
                    </span>

                    <form action="{{ route('games.destroy', $game->id) }}" method="post" id="{{ $game->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
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
    <script>
        document.addEventListener('click', (e) => {
            const fuenteEvento = e.target;

            if(fuenteEvento.dataset.eliminarSubmit) {
                console.log(fuenteEvento.dataset.eliminarSubmit);
                console.log(document.querySelector(`form[id="${fuenteEvento.dataset.eliminarSubmit}"]`));
            }
        });
    </script>
</body>
</html>
