<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\VideoGame;
use Illuminate\Http\Request;

class VideoGameController extends Controller
{
    // Página principal de juegos
    public function index() {
        $games = VideoGame::orderBy('id', 'desc')->get();

        // Ordenar una colección
        // $games = VideoGame::all()->sortBy([
        //     ['id', 'desc']
        // ]);

        return view('games.index', compact('games'));
    }

    // Formulario para dar de alta un nuevo juego
    public function create() {
        $categories = Category::all();

        return view('games.create', compact('categories'));
    }

    // Guardar en BBDD el nuevo video juego
    public function store(Request $request) {
        // Validación de los campos vía request, valida según las reglas especificadas y devuelve un array con los campos
        $validated = $request->validate([
            // El trim validator ya viene por defecto en el middleware web, basta con usar required
            'name'        => 'required|max:255',
            'category_id' => 'required',
        ]);

        // Si la validación pasa, se ejecutará el código normalmente, si no, se hará un back con el objeto $errors
        $game = new VideoGame;

        // Usar el array validated, es un array asociativo que toma los nombres de los campos como clave
        $game->name        = $validated['name'];
        $game->category_id = $validated['category_id'];
        $game->active      = 1;

        $game->save();

        return to_route('games.index');
    }

    // Despliega el nombre y la categoría a la que pertenece el juego
    public function show(VideoGame $video_game) {
        return view('games.show', compact('video_game'));
    }

    // Formulario para editar un juego
    public function edit(VideoGame $video_game) {
        $categories = Category::all();

        return view('games.edit', compact('categories', 'video_game'));
    }

    // Actualizar el juego con los datos recibidos
    public function update(Request $request, VideoGame $video_game) {
        $video_game->name        = $request->name;
        $video_game->category_id = $request->category_id;
        $video_game->active      = 1;

        $video_game->save();

        return to_route('games.index');
    }
}
