@extends("base.index", ['title' => 'Períodos'])

@section("container")

    <h1>Períodos</h1>

    @if(count($periodos)==0)
        <p>Nenhum período cadastrado!</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ano</th>
                <th>Data de Início</th>
                <th>Data Final</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($periodos as $periodo)
            <tr>
                <td>{{$periodo->id}}</td>
                <td>{{$periodo->ano}}</td>
                <td>{{date('d/m/Y', strtotime($periodo->dt_inicio))}}</td>
                <td>{{date('d/m/Y', strtotime($periodo->dt_fim))}}</td>
                <td><a class="btn btn-warning" href="/periodos/{{$periodo->id}}/edit">Editar</a></td>
                <td><a class="btn btn-danger" href="/periodos/{{$periodo->id}}/destroy">Remover</a></td>
            </tr>
            
        @endforeach
        </tbody>
    </table>
    @endif
    <a class="btn btn-primary" href="/periodos/create">Novo Período</a>

@endsection