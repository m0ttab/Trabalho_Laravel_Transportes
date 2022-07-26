@if(count($cursos)==0)
    Nenhum curso cadastrado!
@else
<ul>
    @foreach($cursos as $curso)
        <li>
            {{$curso->nome}}&nbsp;{{$curso->nome_reduzido}}
            <button><a href="/cursos/{{$curso->id}}/edit">Editar</a></button>
            <button><a href="/cursos/{{$curso->id}}/destroy">Remover</a></button>
        </li>
    @endforeach
    </ul>
@endif
<br>
<button><a href="/cursos/create">Novo curso</a></button>