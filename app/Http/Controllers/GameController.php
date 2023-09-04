<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    // Página principal de juegos
    public function index() {
        return "Bienvenido a la web que listará los games comprados";
    }

    // Formulario para dar de alta un nuevo juego
    public function create() {
        return "Esta es la página donde se creará el formulario para dar de alta games, estamos usando un controlador";
    }

    // Despliega el nombre y la categoría a la que pertenece el juego
    public function help($name_game, $category = '') {
        $response = ($category === '')
        ? "Bienvenido a la página del juego: $name_game"
        : "Bienvenido a la página del juego: {$name_game} que pertenece a la categoría: {$category}";

        return $response;
    }
}
