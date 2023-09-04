<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return "Bienvenidos al curso de Laravel 9 en El rincón de Isma";
});

Route::get('/juegos', function () {
    return "Bienvenido a la web que listará los juegos comprados";
});

// Flujo de ejecución, se debe colocar en orden si tiene la misma estructura
Route::get('/juegos/create', function () {
    return "Esta es la página donde se creará el formulario para dar de alta juegos";
});

// Parámetros opcionales
Route::get('/juegos/{nombreJuego}/{categoria?}', function ($nombreJuego, $categoria = '') {
    $response = ($categoria === '')
    ? "Bienvenido a la página del juego: $nombreJuego"
    : "Bienvenido a la página del juego: {$nombreJuego} que pertenece a la categoría: {$categoria}";

    return $response;
});
