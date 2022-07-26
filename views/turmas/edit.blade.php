<form action='/turmas/update' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <input type='text' value="{{ $turma->nome }}" name='nome' placeholder="Entre com o nome"/>
    <input type='text' value="{{ $turma->curso_id }}" name='curso_id'/>
    <input type="hidden" value="{{ $turma->id }}" name="id"/>
    <button type='submit'>Alterar</button>
</form>
