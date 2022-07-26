@if(count($empregados)==0)
    Nenhum empregado cadastrado!
@else
<ul>
    @foreach($empregados as $empregado)
        <li>
            {{$empregado->nome}}&nbsp;{{$empregado->cargo}}&nbsp;{{$empregado->idade}}
            <button><a href="/empregados/{{$empregado->id}}/edit">Editar</a></button>
            <button><a href="/empregados/{{$empregado->id}}/destroy">Remover</a></button>
        </li>
    @endforeach
    </ul>
@endif
<br>
<button><a href="/empregados/create">Novo empregado</a></button>