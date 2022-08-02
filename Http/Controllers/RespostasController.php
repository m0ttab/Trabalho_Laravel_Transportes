<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RespostasController extends Controller
{
    function index(){
        $respostas = DB::select('select * from respostas');

        return view('respostas.index', [
            'respostas' => $respostas
        ]);
    }

    function create(){

        $periodos = DB::select('select * from periodos');

        return view('respostas.create', [
            'periodos' => $periodos,
            'bool' => false
        ]);
    }

    function store(Request $request){
        $data = $request->all();

        unset($data['_token']);

        DB::insert("INSERT INTO respostas(periodo_id, turma_id, uf_id, nome_aluno, cpf, cidade, cidade_id, uf, transporte, poder_publico_responsavel, diferenca_paga)
                    VALUES (:periodo_id, :turma_id, :uf_id, :nome_aluno, :cpf, :cidade, :cidade_id, :uf, :transporte, :poder_publico_responsavel, :diferenca_paga)",
        $data);

        return redirect('/respostas');
        
    }
    
}
