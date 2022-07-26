<form action='/periodos/update' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <input type='text' value="{{ $periodo->ano }}" name='ano' placeholder="Entre com o ano"/>
    <input type='text' value="{{ $periodo->dt_inicio }}" name='dt_inicio' placeholder="Entre com a data de início"/>
    <input type='text' value="{{ $periodo->dt_fim }}" name='dt_fim' placeholder="Entre com a data de fim"/>
    <input type="hidden" value="{{ $periodo->id }}" name="id"/>
    <button type='submit'>Alterar</button>
</form>
