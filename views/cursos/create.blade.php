
<form action='/cursos/store' method='post'>
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <label>Nome:</label>
    <input type='text' name='nome' placeholder="Entre com o nome"/>
    <label>Nome Reduzido:</label>
    <input type='text' name='nome_reduzido' placeholder="Entre com o nome reduzido"/>
    <button type='submit'>Enviar</button>
</form>