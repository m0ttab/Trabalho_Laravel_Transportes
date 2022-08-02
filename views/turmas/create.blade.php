@extends("base.index", ['title' => 'Cadastrar Turma'])

@section("container")

<h1>Cadastrar Turma</h1>

<form id="form">
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <div class="form-group">
      <label>Nome:</label>
      <input class="form-control" type='text' name='nome' placeholder="Digite o nome"/>
    </div>
    <div class="form-group">
      <label>Curso:</label>
      <select class="form-control" id="cursos" name="curso_id">
        <option value="">Selecione o Curso</option>
      </select>
    </div>
    <button class="btn btn-warning" type='submit'>Enviar</button>
    <button class="btn btn-danger" type='reset'>Cancelar</button>
    <a class="btn btn-primary" href="/turmas">Voltar</a>
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
      
    fetch('/turmas/store', {
        
      method: 'POST',
      body: form_data
        
    }).then((req) => {
        
      if(req.status == 200){

          alert('Formulário enviado!');
          document.getElementById('form').reset();

      }else{

          alert('Erro no cadastro!');

      }
        
    });

  }

</script>

@endsection