@extends("base.index", ['title' => 'Turmas'])

@section("container")

    <h1>Turmas</h1>

    @if(count($turmas)==0)
        <p>Nenhuma turma cadastrada!</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Id do Curso</th>
                <th>Nome</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($turmas as $turma)
            <tr id="turm{{$turma->id}}">
                <td>{{$turma->id}}</td>
                <td>{{$turma->curso_id}}</td>
                <td>{{$turma->nome}}</td>
                <td><a class="btn btn-warning" href="/turmas/{{$turma->id}}/edit">Editar</a></td>
                <td><a class="btn btn-danger" onclick="apagar({{$turma->id}})">Remover</a></td>
            </tr>
            
        @endforeach
        </tbody>
    </table>
    @endif
    <a class="btn btn-primary" href="/turmas/create">Nova Turma</a>
    <script>

        function apagar(id){

            fetch('/turmas/'+ id +'/destroy').then((req) => {
                
                if(req.status == 200){

                    alert('Excluído com sucesso!');
                    document.getElementById('turm'+id).remove();

                }else{

                    alert('Erro ao excluir!');

                }
                
            });

        }

    </script>

@endsection