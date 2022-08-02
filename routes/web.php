<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\PeriodosController;
use App\Http\Controllers\TurmasController;
use App\Http\Controllers\RespostasController;


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

Route::get('/api/cursos', function(){

    $respostas = DB::select('select * from cursos');

    echo json_encode($respostas);

});
Route::get('/api/turmas', function(){

    $respostas = DB::select('select * from turmas');

    echo json_encode($respostas);

});
Route::get('/api/periodos', function(){

    $respostas = DB::select('select * from periodos');

    echo json_encode($respostas);

});

Route::get('/cursos', [CursosController::class, 'index']);
Route::get('/cursos/create', [CursosController::class, 'create']);
Route::post('/cursos/store', [CursosController::class, 'store']);
Route::get('/cursos/{id}/edit', [CursosController::class, 'edit']);
Route::post('/cursos/update', [CursosController::class, 'update']);
Route::get('/cursos/{id}/destroy', [CursosController::class, 'destroy']);

Route::get('/periodos', [PeriodosController::class, 'index']);
Route::get('/periodos/create', [PeriodosController::class, 'create']);
Route::post('/periodos/store', [PeriodosController::class, 'store']);
Route::get('/periodos/{id}/edit', [PeriodosController::class, 'edit']);
Route::post('/periodos/update', [PeriodosController::class, 'update']);
Route::get('/periodos/{id}/destroy', [PeriodosController::class, 'destroy']);

Route::get('/turmas', [TurmasController::class, 'index']);
Route::get('/turmas/create', [TurmasController::class, 'create']);
Route::post('/turmas/store', [TurmasController::class, 'store']);
Route::get('/turmas/{id}/edit', [TurmasController::class, 'edit']);
Route::post('/turmas/update', [TurmasController::class, 'update']);
Route::get('/turmas/{id}/destroy', [TurmasController::class, 'destroy']);

Route::get('/respostas', [RespostasController::class, 'index']);
Route::get('/respostas/create', [RespostasController::class, 'create']);
Route::post('/respostas/store', [RespostasController::class, 'store']);