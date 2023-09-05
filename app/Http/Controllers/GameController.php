<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    // Página principal de juegos
    public function index() {
        $games = ['Fifa 22', 'NBA 22', 'Mario Kart', 'Super Mario'];

        return view('games.index', compact('games'));
    }

    // Formulario para dar de alta un nuevo juego
    public function create() {
        return view('games.create');
    }

    // Despliega el nombre y la categoría a la que pertenece el juego
    public function help($name_game, $category = '') {
        $date = date('d-m-Y');

        // Da la fecha y hora según el timezone indicado
        // $date = Now('America/Caracas');

        return view('games.show', ['name' => $name_game, 'category' => $category, 'fecha' => $date]);
    }
}