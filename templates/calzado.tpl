{include 'header.tpl'}

<div class="calzado">
  {if !empty($calzado)}
    <div>
      <ul class="containerList" style="width: 20rem;">
        <h5 class='shoe'>Calzado</h5>
        <li class="list-group-item articles">{$calzado->nombre}</li>
        <li class="list-group-item articles">{$calzado->tipo}</li>
        <li class="list-group-item articles">Talle: {$calzado->talle}</li>
        <li class="list-group-item articles">${$calzado->precio}</li>
        <li class="list-group-item articles">{$calzado->descripcion}</li>
        <li class="list-group-item articles">{$calzado->marca}</li>
        {if $calzado->imagen}
          <img src="img/{$calzado->imagen}" alt="{$calzado->nombre}" class="imgCalzado">
        {else}
          <li class="imgcontainer">GOAT Streetwear</li>
        {/if}
        <li class="list-group-item articles" value="{$calzado->id_marca}">{$calzado->nombre}</li>
      </ul>
    </div>
  {else}
    <h1 class="nodata">No hay calzado disponible</h1>
  {/if}
</div>

{include 'footer.tpl'}
