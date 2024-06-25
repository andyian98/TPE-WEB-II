<form class="form col-4" action="addCalzado" method="POST" enctype="multipart/form-data">   
    <legend class="text-center">Agregar calzado</legend>
<div class="mb-3">
   <label class="form-label">Nombre del calzado</label>
   <input type="text" name="tipo" class="form-control" placeholder="Ingrese el nombre del calzado">
 </div>
 <div class="mb-3">
   <label class="form-label">Tipo de calzado</label>
   <input type="text" name="tipo" class="form-control" placeholder="Ingrese el tipo de calzado">
 </div>
<div class="mb-3">
   <label class="form-label">Talle del calzado</label>
   <input type="text" name="talle" class="form-control" placeholder="Ingrese el talle">
 </div>
 <div class="mb-3">
   <label class="form-label">Precio del calzado</label>
   <input type="text" name="precio" class="form-control" placeholder="Ingrese el precio">
 </div>
 <div class="mb-3">
   <label class="form-label">Descripción del calzado</label>
   <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripción">
 </div>
 <div class="mb-3">
 <label class="form-label">Agregar imagen</label>
 <input type="file" name="imagen" class="form-control">
</div>
 <div class="mb-3">
 <label class="form-label">Marca a la que pertenece</label>
 <select  name="id_marca" class="form-select">
    {foreach $marcas as $marca}
      <option value="{$marca->id_marca}">{$marca->nombre}</option>
    {/foreach}
  </select>
</div>
 <button type="submit" class="btnAdd col-12">Añadir</button>
</form>