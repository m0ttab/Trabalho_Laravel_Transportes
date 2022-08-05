@extends("base.index", ['title' => 'Cadastrar Respostas'])

@section("container")

<h1>Cadastro de Respostas</h1>

@if($periodo_id == null)

<p>Você está fora do período de inscrições!</p>

@else

<form id="form">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="hidden" name="periodo_id" value="{{$periodo_id}}">
  <div class="form-group">
    <input class="form-control" type="text" name="nome_aluno" placeholder="Informe seu nome">
  </div>
  <div class="form-group">
    <select class="form-control" id="cursos">
        <option value="">Selecione seu curso</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="turmas" name="turma_id">
        <option value="">Selecione sua turma</option>
    </select>
  </div>
  <div class="form-group">
    <input class="form-control" type="number" name="cpf" placeholder="Informe seu cpf">
  </div>
  <div class="form-group">
    <input type="hidden" id="estados_id" name="uf_id">
    <select class="form-control" id="estados" name="uf">
        <option value="">Selecione seu estado</option>
    </select>
  </div>
  <div class="form-group">
    <input type="hidden" id="cidades_id" name="cidade_id">
    <select class="form-control" id="cidades" name="cidade">
        <option value="">Selecione sua cidade</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="transporte" name="transporte">
        <option value="">Selecione seu transporte</option>
        <option value="Ônibus">Ônibus</option>
        <option value="Micro-ônibus">Micro-ônibus</option>
        <option value="Van">Van</option>
    </select>
  </div>
  <p>Poder público responsável:</p>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="poder_publico_responsavel" value="Prefeitura">
    <label>Prefeitura</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="poder_publico_responsavel" value="Estado">
    <label>Estado</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="chbx"> Pago diferença
  </div>
  <div class="form-group">
    <input style="display: none" class="form-control" type="number" name="diferenca_paga" id="dif" placeholder="Informe a diferença paga">
  </div>
  <div class="form-group">
    <button class="btn btn-warning" type="submit">Enviar</button>
    <button class="btn btn-danger" type='reset'>Cancelar</button>
  </div>
</form>
</div>
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

        document.getElementById('cursos').onchange = () => {

            getTurmas();

        }

    }

    async function getTurmas(){

        var id_curso = document.getElementById('cursos').value;
        
        document.getElementById('turmas').innerHTML = '';

        var opt = document.createElement('option');
        opt.innerHTML = 'Selecione sua turma';
        opt.setAttribute('value', '');

        document.getElementById('turmas').appendChild(opt);

        const req = await fetch('/api/turmas');
        const res = await req.json();

        for(const turma of res){
          
          if(parseInt(turma.curso_id) == parseInt(id_curso)){
            
            opt = document.createElement('option');
            opt.innerHTML = turma.nome;
            opt.setAttribute('value', turma.id);

            document.getElementById('turmas').appendChild(opt);
            
          }

        }

    }

    async function getCidades(){

        var uf = document.getElementById('estados').value;
        
        document.getElementById('cidades').innerHTML = '';
        
        var opt = document.createElement('option');

        opt.innerHTML = 'Selecione sua cidade';

        opt.setAttribute('value', '');

        document.getElementById('cidades').appendChild(opt);

        const req = await fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados/'+ uf + '/municipios');
        const res = await req.json();

        for(const cidade of res){
            
            opt = document.createElement('option');
            opt.innerHTML = cidade.nome;
            opt.setAttribute('value', cidade.nome);

            document.getElementById('cidades').appendChild(opt);

        }

        document.getElementById('cidades').onchange = function() {

            for(const cidade of res){

              if(cidade.nome == this.value){

                document.getElementById('cidades_id').value = cidade.id;

              }

            }

        }

    }

    async function getEstados(){

        const req = await fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        const res = await req.json();

        for(const estado of res){
            
            var opt = document.createElement('option');
            opt.innerHTML = estado.sigla + ' - ' + estado.nome;
            opt.setAttribute('value', estado.sigla);

            document.getElementById('estados').appendChild(opt);

        }

        document.getElementById('estados').onchange = function() {

            for(const estado of res){

              if(estado.sigla == this.value){

                document.getElementById('estados_id').value = estado.id;

              }

            }

            getCidades();

        }

    }

    getCursos();
    getEstados();
    
    document.getElementById('chbx').onchange = function(){
      
      var d = document.getElementById('dif');
      
      if(this.checked){
        
        d.style.display = 'block';
        
      }else{
        
        d.style.display = 'none';
        
      }
      
    }

    document.getElementById('form').onsubmit = (e) => {
      
        e.preventDefault();

        var form_data = new FormData(document.getElementById('form'));
        
        fetch('/respostas/store', {
          
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

@endif

@endsection
