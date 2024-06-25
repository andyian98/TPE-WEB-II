{include 'header.tpl'}

<div class="calzado">
{if !empty($calzadoPorMarca)}
{foreach $calzadoPorMarca as $cPorM}

  <div>
  <ul class="containerList" style="width: 20rem";>
    <h5 class='indu'>Calzados:</h5>
    <li class="list-group-item articles">{$cPorM->nombre}</li>
      <li class="list-group-item articles">{$cPorM->tipo}</li>
      <li class="list-group-item articles">Talle:{$cPorM->talle}</li>
      <li class="list-group-item articles">${$cPorM->precio}</li>
      <li class="list-group-item articles">{$cPorM->descripcion}</li>
      <img src="img/{$cPorM->imagen}" alt="{$cPorM->nombre}" class="imgCalzado">
      </ul>
    </div>
{/foreach}
{else}
  <h1 class="nodata">No hay calzados disponibles</h1>
{/if}
</div>


{include 'footer.tpl'}