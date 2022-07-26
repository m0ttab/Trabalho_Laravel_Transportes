<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class turmasController extends Controller
{
    function index(){
        $turmas = DB::select('select *, floor(datediff(now(), datanasc)/365) as idade from turmas;');

        return view('turmas.index', [
            'turmas' => $turmas
        ]);
    }

    function create(){
        return view('turmas.create');
    }

    function store(Request $request){
        $data = $request->all();

        unset($data['_token']);
        DB::insert("
        INSERT INTO turmas(nome, cargo, datanasc) VALUES (:nome, :cargo, :datanasc);",
        $data);

        return redirect('/turmas');
    }

    function edit($id){
        $turmas = DB::select("
            SELECT * FROM turmas WHERE id = ?",
            [$id]
        );

        return view('turmas.edit', ['turma' => $turmas[0]]);
    }

    function update(Request $request){
        // Retorna vetor associativo
        $data = $request->all();
        // Remover o índice _token
        unset($data['_token']);

        DB::update("
            UPDATE turmas
            SET
                nome = :nome,
                cargo = :cargo,
                datanasc = :datanasc
            WHERE
                id = :id
        ", $data);

        return redirect('/turmas');
    }

    function destroy($id){
        DB::delete("DELETE FROM turmas WHERE id = ?", [$id]);

        return redirect('/turmas');
    }
}