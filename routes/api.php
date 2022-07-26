<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cursos', [CursosController::class, 'index']);
Route::get('/cursos/create', [CursosController::class, 'create']);
Route::post('/cursos/store', [CursosController::class, 'store']);
Route::get('/cursos/{id}/edit', [CursosController::class, 'edit']);
Route::post('/cursos/update', [CursosController::class, 'update']);
Route::get('/cursos/{id}/destroy', [CursosController::class, 'destroy']);
