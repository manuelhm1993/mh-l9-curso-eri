<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games - Show</title>
</head>
<body>
    <h1>Detalles del juego</h1>

    <ul>
        <li>Nombre: {{ $video_game->name }}</li>
        <li>Categoría: {{ $video_game->category->name }}</li>
        <li>Fecha: {{ date('d/m/Y', strtotime($video_game->created_at)) }}</li>
    </ul>
</body>
</html>
