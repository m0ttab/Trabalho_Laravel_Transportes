<form action='/cursos/update' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <input type='text' value="{{ $curso->nome }}" name='nome' placeholder="Entre com o nome"/>
    <input type='text' value="{{ $curso->nome_reduzido }}" name='nome_reduzido' placeholder="Entre com o nome reduzido"/>
    <input type="hidden" value="{{ $curso->id }}" name="id"/>
    <button type='submit'>Alterar</button>
</form>
