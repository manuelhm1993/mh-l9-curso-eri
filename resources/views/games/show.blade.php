<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games - Show</title>
</head>
<body>
    @if ($category === '')
        <h1>El nombre del video juego es: {{ $name }}</h1>
    @else
        <h1>El nombre del video juego es: {{ $name }} y la categoría es: {{ $category }}</h1>
    @endif

    <h3>Fecha: {{ $fecha }}</h3>
</body>
</html>
