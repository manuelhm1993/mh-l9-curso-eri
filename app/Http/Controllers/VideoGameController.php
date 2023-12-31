<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoGameRequest;
use App\Mail\VideoGameMail;
use App\Models\Category;
use App\Models\VideoGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    public function store(StoreVideoGameRequest $request) {
        // El método validated retorna un array asociativo con los nombres de los campos como clave
        $validated = $request->validated();

        // Luego de dar de alta la propiedad fillable con los campos, se puede usar create y un array asociativo
        $game = VideoGame::create($validated);

        // Enviar un email de notificación un usuario
        // Mail::to('manuel_hm1993@hotmail.com')->send(new VideoGameMail('Manuel Henriquez'));

        // Enviar un email de notificación un lote de usuarios
        $lote = [
            'Manuel Henriquez' => 'manuel_hm1993@hotmail.com',
            'Fanny Carvajal'   => 'fannylucarvajal@gmail.com'
        ];

        foreach ($lote as $userName => $recipient) {
            Mail::to($recipient)->send(new VideoGameMail($userName));
        }

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
        // Validación de datos
        $validated = $request->validate([
            'name'        => 'required|max:255',
            'category_id' => 'required',
        ]);

        $video_game->name        = $validated['name'];
        $video_game->category_id = $validated['category_id'];
        $video_game->active      = 1;

        $video_game->save();

        return to_route('games.index');
    }

    // Eliminar el juego recibido
    public function destroy(VideoGame $video_game) {
        $video_game->delete();

        return to_route('games.index');
    }
}
