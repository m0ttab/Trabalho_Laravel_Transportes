@extends("base.index", ['title' => 'Alterar Turma'])

@section("container")

<h1>Alterar Turma</h1>

<form id="form">
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <input type="hidden" value="{{ $turma->id }}" name="id"/>
    <div class="form-group">
      <label>Nome:</label>
      <input class="form-control" type='text' name='nome' value="{{ $turma->nome }}" placeholder="Digite o nome"/>
    </div>
    <div class="form-group">
      <label>Curso:</label>
      <select class="form-control" id="cursos" name="curso_id">
        <option value="">Selecione o Curso</option>
      </select>
    </div>
    <button class="btn btn-warning" type='submit'>Alterar</button>
    <button class="btn btn-danger" type='reset'>Cancelar</button>
    <a class="btn btn-primary" href="/cursos">Voltar</a>
</form>
<script>

  async function getCursos(){

    const req = await fetch('/api/cursos');
    const res = await req.json();

    for(const curso of res){
        
        var opt = document.createElement('option');
        opt.innerHTML = curso.nome;
        opt.setAttribute('value', curso.id);

        document.getElementById('cursos').appendChild(opt);
        

    }

  }

  getCursos();

  document.getElementById('form').onsubmit = (e) => {
      
      e.preventDefault();

      var form_data = new FormData(document.getElementById('form'));
      
      fetch('/turmas/update', {
        
        method: 'POST',
        body: form_data
        
      }).then((req) => {
        
        if(req.status == 200){

            alert('Formulário enviado!');

        }else{

            alert('Erro no cadastro!');

        }
        
      });

  }

</script>

@endsection