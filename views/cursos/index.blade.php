@extends("base.index", ['title' => 'Cursos'])

@section("container")

    <h1>Cursos</h1>

    @if(count($cursos)==0)
        <p>Nenhum curso cadastrado!</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Nome Reduzido</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cursos as $curso)
            <tr id="curs{{$curso->id}}">
                <td>{{$curso->id}}</td>
                <td>{{$curso->nome}}</td>
                <td>{{$curso->nome_reduzido}}</td>
                <td><a class="btn btn-warning" href="/cursos/{{$curso->id}}/edit">Editar</a></td>
                <td><a class="btn btn-danger" onclick="apagar({{$curso->id}})">Remover</a></td>
            </tr>
            
        @endforeach
        </tbody>
    </table>
    @endif
    <a class="btn btn-primary" href="/cursos/create">Novo curso</a>
    <script>

        function apagar(id){

            fetch('/cursos/'+ id +'/destroy').then((req) => {
                
                if(req.status == 200){

                    alert('Excluído com sucesso!');
                    document.getElementById('curs'+id).remove();

                }else{

                    alert('Erro ao excluir!');

                }
                
            });

        }

    </script>

@endsection