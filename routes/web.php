<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VideoGameController;

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

// Rutas de controlador, si se tienen varias rutas que comparten un controlador común, se agrupan, se les puede agregar prefix y name
Route::controller(VideoGameController::class)->prefix('/games')->name('games.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{name_game}/{category?}', 'help')->name('help');
});
