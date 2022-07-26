<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodosController extends Controller
{
    function index(){
        $periodos = DB::select('select *, floor(datediff(now(), datanasc)/365) as idade from periodos;');

        return view('periodos.index', [
            'periodos' => $periodos
        ]);
    }

    function create(){
        return view('periodos.create');
    }

    function store(Request $request){
        $data = $request->all();

        unset($data['_token']);
        DB::insert("
        INSERT INTO periodos(nome, cargo, datanasc) VALUES (:nome, :cargo, :datanasc);",
        $data);

        return redirect('/periodos');
    }

    function edit($id){
        $periodos = DB::select("
            SELECT * FROM periodos WHERE id = ?",
            [$id]
        );

        return view('periodos.edit', ['periodo' => $periodos[0]]);
    }

    function update(Request $request){
        // Retorna vetor associativo
        $data = $request->all();
        // Remover o índice _token
        unset($data['_token']);

        DB::update("
            UPDATE periodos
            SET
                nome = :nome,
                cargo = :cargo,
                datanasc = :datanasc
            WHERE
                id = :id
        ", $data);

        return redirect('/periodos');
    }

    function destroy($id){
        DB::delete("DELETE FROM periodos WHERE id = ?", [$id]);

        return redirect('/periodos');
    }
}