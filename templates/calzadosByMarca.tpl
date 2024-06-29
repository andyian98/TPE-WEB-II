{include 'header.tpl'}

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="calzado">
    {if !empty($calzadoByMarca)}
      <div class="row row-cols-1 row-cols-md-3 g-4">
        {foreach $calzadoByMarca as $item}
          <div class="col">
            <ul class="containerList" style="width: 20rem;">
              <h5>Calzado</h5>
              <img src="images/{$item->imagen}" alt="{$item->nombre}"">
              <li class="list-group-item articles">{$item->nombre}</li>
              <li class="list-group-item articles">{$item->tipo}</li>
              <li class="list-group-item articles">Talle: {$item->talle}</li>
              <li class="list-group-item articles">$ {$item->precio}</li>
              <li class="list-group-item articles">{$item->descripcion}</li>
            </ul>
          </div>
        {/foreach}
      </div>
    {else}
      <h1 class="nodata">No hay calzados disponibles</h1>
    {/if}
  </div>
</div>

{include 'footer.tpl'}
