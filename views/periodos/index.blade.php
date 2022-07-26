@if(count($periodos)==0)
    Nenhum periodo cadastrado!
@else
<ul>
    @foreach($periodos as $periodo)
        <li>
            {{$periodo->ano}}&nbsp;{{$periodo->dt_inicio}}&nbsp;{{$periodo->dt_fim}}
            <button><a href="/periodos/{{$periodo->id}}/edit">Editar</a></button>
            <button><a href="/periodos/{{$periodo->id}}/destroy">Remover</a></button>
        </li>
    @endforeach
    </ul>
@endif
<br>
<button><a href="/periodos/create">Novo periodo</a></button>