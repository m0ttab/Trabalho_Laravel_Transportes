
<form action='/empregados/store' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <label>Nome:</label>
    <input type='text' name='nome' placeholder="Entre com o nome"/>
    <label>Cargo:</label>
    <input type='text' name='cargo' placeholder="Entre com o cargo"/>
    <label>Data de Nascimento:</label>
    <input type='date' name='datanasc' placeholder="Entre com a data de nascimento"/>
    <button type='submit'>Enviar</button>
</form>