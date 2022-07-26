<form action='/empregados/update' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <input type='text' value="{{ $empregado->nome }}" name='nome' placeholder="Entre com o nome"/>
    <input type='text' value="{{ $empregado->cargo }}" name='cargo' placeholder="Entre com o cargo"/>
    <input type='text' value="{{ $empregado->datanasc }}" name='datanasc' placeholder="Entre com a data de nascimento"/>
    <input type="hidden" value="{{ $empregado->id }}" name="id"/>
    <button type='submit'>Alterar</button>
</form>
