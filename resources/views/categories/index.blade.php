<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories - Inicio</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Vista creada en blade y llamada desde el CategoryController</h1>

    <p>
        <a href="{{ route('categories.create') }}">Nueva categoría</a>
        <a href="{{ route('games.index') }}">Ver juegos</a>
    </p>

    <h2>Listado de categorías</h2>

    <table>
        <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Nombre</th>
                <th scope="row">Descripción</th>
                <th scope="row">Creada</th>
                <th scope="row">Disponible</th>
                <th scope="row">Acciones</th>
            </tr>
        </thead>

        <tbody>
        {{-- Forelse, útil para agregar condiciones aplicadas a un bucle --}}
        @forelse ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ date('d/m/Y', strtotime($category->created_at)) }}</td>
                <td align="center">
                    @if ($category->active)
                        <span style='color:green'>Si</span>
                    @else
                        <span style='color:red'>No</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}">Ver</a>
                    <a href="{{ route('categories.edit', $category->id) }}">Editar</a>

                    {{-- Link para enviar el formulario de eliminación --}}
                    <a
                    href="{{ route('categories.destroy', $category->id) }}"
                    data-category-id="{{ $category->id }}"
                    data-category-name="{{ $category->name }}"
                    >
                        Eliminar
                    </a>

                    {{-- Formulario para eliminar un juego --}}
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post" id="{{ $category->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>No hay categorías disponibles</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        const eliminar = (category) => {
            if(confirm(`¿Desea eliminar la categoría ${category.name}?`)) {
                document.querySelector(`form[id="${category.id}"]`).submit();
            }
        };

        // Delegación de eventos
        document.addEventListener('click', (e) => {
            const fuenteEvento = e.target;

            // Validar que sea un link de submit y enviar el formulario correspondiente
            if(fuenteEvento.dataset.categoryId) {
                e.preventDefault();

                const category = {
                    id: fuenteEvento.dataset.categoryId,
                    name: fuenteEvento.dataset.categoryName,
                }

                eliminar(category);
            }
        });
    </script>
</body>
</html>
