@if(count($turmas)==0)
    Nenhuma turma cadastrado!
@else
<ul>
    @foreach($turmas as $turma)
        <li>
            {{$turma->nome}}&nbsp;{{$turma->curso_id}}
            <button><a href="/turmas/{{$turma->id}}/edit">Editar</a></button>
            <button><a href="/turmas/{{$turma->id}}/destroy">Remover</a></button>
        </li>
    @endforeach
    </ul>
@endif
<br>
<button><a href="/turmas/create">Novo turma</a></button>