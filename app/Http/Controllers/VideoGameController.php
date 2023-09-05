<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\VideoGame;
use Illuminate\Http\Request;

class VideoGameController extends Controller
{
    // Página principal de juegos
    public function index() {
        // $games = VideoGame::orderBy('id', 'desc')->get();

        // Ordenar una colección
        $games = VideoGame::all()->sortBy([
            ['id', 'desc']
        ]);

        return view('games.index', compact('games'));
    }

    // Formulario para dar de alta un nuevo juego
    public function create() {
        $categories = Category::all();

        return view('games.create', compact('categories'));
    }

    // Guardar en BBDD el nuevo video juego
    public function store(Request $request) {
        $game = new VideoGame;

        $game->name        = $request->name;
        $game->category_id = $request->category_id;
        $game->active      = 1;

        $game->save();

        return to_route('games.index');
    }

    // Despliega el nombre y la categoría a la que pertenece el juego
    public function show(VideoGame $video_game) {
        return view('games.show', compact('video_game'));
    }
}
