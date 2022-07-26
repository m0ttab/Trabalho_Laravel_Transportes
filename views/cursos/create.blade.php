
<form action='/cursos/store' method='post'>
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
<input type='text' name='nome' placeholder="Entre com o nome"/>
    <label>Nome:</label>
    <input type='text' name='nome_reduzido' placeholder="Entre com o nome reduzido"/>
    <label>Nome Reduzido:</label>
    <button type='submit'>Enviar</button>
</form>