@extends("base.index", ['title' => 'Cadastrar Períodos'])

@section("container")

<h1>Cadastrar Período</h1>

<form id="form">
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <div class="form-group">
        <label>Ano:</label>
        <input class="form-control" type='number' name='ano' placeholder="Digite o ano"/>
    </div>
    <div class="form-group">
        <label>Data de Início:</label>
        <input class="form-control" type='date' name='dt_inicio'/>
    </div>
    <div class="form-group">
        <label>Data Final:</label>
        <input class="form-control" type='date' name='dt_fim'/>
    </div>
    <button class="btn btn-warning" type='submit'>Enviar</button>
    <button class="btn btn-danger" type='reset'>Cancelar</button>
    <a class="btn btn-primary" href="/periodos">Voltar</a>
</form>
<script>

    document.getElementById('form').onsubmit = (e) => {
      
      e.preventDefault();

      var form_data = new FormData(document.getElementById('form'));
      
      fetch('/periodos/store', {
        
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