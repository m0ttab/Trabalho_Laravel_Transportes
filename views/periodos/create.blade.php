
<form action='/periodos/store' method='post'>
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <label>Ano:</label>
<input type='text' name='ano' placeholder="Entre com o ano"/>
<label>Data de início:</label>
    <input type='text' name='dt_inicio' placeholder="Entre com a data de início"/>
    <label>Data de fim:</label>
    <input type='text' name='dt_fim' placeholder="Entre com a data de fim"/>
    <button type='submit'>Enviar</button>
</form>