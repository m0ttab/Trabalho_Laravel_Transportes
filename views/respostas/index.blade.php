@extends("base.index", ['title' => 'Respostas'])

@section("container")

    <h1>Respostas</h1>

    @if(count($respostas)==0)
        <p>Nenhuma resposta cadastrada!</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Id do Período</th>
                <th>Id da Turma</th>
                <th>Id UF</th>
                <th>Id da Cidade</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Transporte</th>
                <th>Poder Responsável</th>
                <th>Diferença Paga</th>
            </tr>
        </thead>
        <tbody>
        @foreach($respostas as $resposta)
            <tr>
                <td>{{$resposta->id}}</td>
                <td>{{$resposta->periodo_id}}</td>
                <td>{{$resposta->turma_id}}</td>
                <td>{{$resposta->uf_id}}</td>
                <td>{{$resposta->cidade_id}}</td>
                <td>{{$resposta->nome_aluno}}</td>
                <td>{{$resposta->cpf}}</td>
                <td>{{$resposta->cidade}}</td>
                <td>{{$resposta->uf}}</td>
                <td>{{$resposta->transporte}}</td>
                <td>{{$resposta->poder_publico_responsavel}}</td>
                <td>{{$resposta->diferenca_paga}}</td>
            </tr>
            
        @endforeach
        </tbody>
    </table>
    @endif
    <a class="btn btn-primary" href="/respostas/create">Deixar Resposta</a>

@endsection