s<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API para criar book
Route::post('/add_book', [App\Http\Controllers\HomeController::class, 'addBook']);

//API para deletar book
Route::post('/remove_book', [App\Http\Controllers\HomeController::class, 'removeBook']);

//API para favorita e remover dos favoritos
Route::post('/favorite', [App\Http\Controllers\HomeController::class, 'favoriteBook']);

// API para filtrar todos o livros favoritados
Route::post('/favoritos', [App\Http\Controllers\HomeController::class, 'favoritos']);
