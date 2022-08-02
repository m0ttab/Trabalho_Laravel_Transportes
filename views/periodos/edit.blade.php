@extends("base.index", ['title' => 'Alterar Período'])

@section("container")

<h1>Alterar Período</h1>

<form action='/periodos/update' method='post'>
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <input type="hidden" value="{{ $periodo->id }}" name="id"/>
    <div class="form-group">
        <label>Ano:</label>
        <input class="form-control" type='number' name='ano' value="{{ $periodo->ano }}" placeholder="Digite o ano"/>
    </div>
    <div class="form-group">
        <label>Data de Início:</label>
        <input class="form-control" type='date' name='dt_inicio' value="{{ $periodo->dt_inicio }}"/>
    </div>
    <div class="form-group">
        <label>Data Final:</label>
        <input class="form-control" type='date' name='dt_fim' value="{{ $periodo->dt_fim }}"/>
    </div>
    <button class="btn btn-warning" type='submit'>Alterar</button>
    <button class="btn btn-danger" type='reset'>Cancelar</button>
    <a class="btn btn-primary" href="/periodos">Voltar</a>
</form>
<script>

    document.getElementById('form').onsubmit = (e) => {
      
      e.preventDefault();

      var form_data = new FormData(document.getElementById('form'));
      
      fetch('/periodos/update', {
        
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