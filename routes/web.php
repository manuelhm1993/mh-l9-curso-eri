<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoGameController;
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
    return redirect()->route('games.index');
});

// Rutas de controlador, si se tienen varias rutas que comparten un controlador común, se agrupan, se les puede agregar prefix y name
Route::controller(VideoGameController::class)->prefix('/games')->name('games.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{video_game}', 'show')->name('show');
    Route::get('/{video_game}/edit', 'edit')->name('edit');
    Route::put('/{video_game}', 'update')->name('update');
    Route::delete('/{video_game}', 'destroy')->name('destroy');
});

// Registra las 7 rutas de un controlador de recursos necesarias para un CRUD en una sóla línea
Route::resources([
    'categories' => CategoryController::class,
]);
