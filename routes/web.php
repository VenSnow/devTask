<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('genres/{genre}/movies', [IndexController::class, 'indexByGenre'])->name('movies.by.genre');
Route::get('movies/{movie}', [IndexController::class, 'show'])->name('movie.show');
Route::prefix('crud')->name('crud.')->group(function () {
    Route::resource('genre', GenreController::class);
    Route::resource('movie', MovieController::class);
});

