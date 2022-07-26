<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller
{
    function index(){
        $cursos = DB::select('select * from cursos;');

        return view('cursos.index', [
            'cursos' => $cursos
        ]);
    }

    function create(){
        return view('cursos.create');
    }

    function store(Request $request){
        $data = $request->all();
        
       unset($data['_token']);
        DB::insert("
        INSERT INTO cursos(nome, nome_reduzido) VALUES (:nome, :nome_reduzido);",
        $data);

        return redirect('/cursos');
    }

    function edit($id){
        $cursos = DB::select("
            SELECT * FROM cursos WHERE id = ?",
            [$id]
        );

        return view('cursos.edit', ['curso' => $cursos[0]]);
    }

    function update(Request $request){
        // Retorna vetor associativo
        $data = $request->all();
        // Remover o índice _token
        unset($data['_token']);

        DB::update("
            UPDATE cursos
            SET
                nome = :nome,
                nome_reduzido = :nome_reduzido
            WHERE
                id = :id
        ", $data);

        return redirect('/cursos');
    }

    function destroy($id){
        DB::delete("DELETE FROM cursos WHERE id = ?", [$id]);

        return redirect('/cursos');
    }
}