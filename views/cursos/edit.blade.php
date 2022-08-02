@extends("base.index", ['title' => 'Alterar Curso'])

@section("container")

<h1>Alterar Curso</h1>

<form id="form">
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <input type="hidden" value="{{ $curso->id }}" name="id"/>
    <div class="form-group">
        <label>Nome:</label>
        <input class="form-control" type='text' name='nome' value="{{ $curso->nome }}" placeholder="Digite o nome"/>
    </div>
    <div class="form-group">
        <label>Nome Reduzido:</label>
        <input class="form-control" type='text' name='nome_reduzido' value="{{ $curso->nome_reduzido }}" placeholder="Digite o nome reduzido"/>
    </div>
    <button class="btn btn-primary" type='submit'>Alterar</button>
</form>
<script>

    document.getElementById('form').onsubmit = (e) => {
      
      e.preventDefault();

      var form_data = new FormData(document.getElementById('form'));
      
      fetch('/cursos/update', {
        
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