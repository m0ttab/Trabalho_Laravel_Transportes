
<form action='/turmas/store' method='post'>
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <label>Nome:</label>
    <input type='text' name='nome' placeholder="Entre com o nome"/>
    <label>Curso:</label>
    <select name="curso_id">
    <option value="1-ADM">Adm</option>
  <option value="2-AGRO">Agro</option>
  <option value="3-ENO">Eno</option>
  <option value="4-INFO" >Info</option>
  <option value="5-MEIO">Meio</option>
</select>
    <button type='submit'>Enviar</button>
</form>