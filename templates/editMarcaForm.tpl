{include 'header.tpl'}

<form class="form col-4" action="updateMarca" method="POST">   
<legend class="text-center">Editar marca</legend>
<div class="mb-3">
<label class="form-label">Nombre de la marca</label>
<input type="text" name="nombre_e" class="form-control" value="{$marca->nombre}">
</div>

<input type="text" name="id_marca" class="form-control" value="{$marca->id_marca}" hidden>

<button type="submit" class="btnAdd col-12">Enviar</button>
</form>

{include 'footer.tpl'}