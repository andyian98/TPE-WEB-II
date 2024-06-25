{include 'header.tpl'}

<form class="form col-4" action="updateCalzado" method="POST">   
<legend class="text-center">Editar calzado</legend>
<div class="mb-3">
<label class="form-label">Nombre del calzado</label>
<input type="text" name="tipo" class="form-control" value="{$calzado->nombre}">
</div>
<div class="mb-3">
<label class="form-label">Tipo de calzado</label>
<input type="text" name="tipo" class="form-control" value="{$calzado->tipo}">
</div>
<div class="mb-3">
<label class="form-label">Talle</label>
<input type="number" name="talle" class="form-control" value="{$calzado->talle}">
</div>
<div class="mb-3">
<label class="form-label">Precio</label>
<input type="number" name="precio" class="form-control" value="{$calzado->precio}">
</div>
<div class="mb-3">
<label class="form-label">Descripción</label>
<input type="text" name="descripcion" class="form-control" value="{$calzado->descripcion}">
</div>
<div class="mb-3">
<label class="form-label">Marca a la que pertenece</label>
<select  name="id_marca" class="form-select">
<option value="{$calzado->id_marca}">{$calzado->nombre}</option>
   {foreach $marcas as $marca}
    {if $marca->id_marca != $calzado->id_marca}
        <option value="{$marca->id_marca}">{$marca->nombre}</option>
    {/if}
    {/foreach}
 </select>
</div>

<input type="text" name="id_calzado" class="form-control" value="{$calzado->id_calzado}" hidden>

<button type="submit" class="btnAdd col-12">Editar</button>
</form>

{include 'footer.tpl'}