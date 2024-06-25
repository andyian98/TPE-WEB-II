{include 'header.tpl'}

<div class="calzado">
{foreach $calzado as $item}
<div>
      <ul class="containerList" style="width: 20rem";>
        <h5 class='calzado'>Calzado</h5>
        <li class="list-group-item articles">{$item->nombre}</li>
        <li class="list-group-item articles">{$item->tipo}</li>
        <li class="list-group-item articles">Talle:{$item->talle}</li>
        <li class="list-group-item articles">${$item->precio}</li>
        <li class="list-group-item articles">{$item->descripcion}</li>
        <img src="img/{$item->imagen}" alt="{$item->nombre}" class="imgCalzado">
        <li class="list-group-item articles" value="{$item->id_marca}">{$item->nombre}</li>
      </ul>
    </div>
{/foreach}
</div>

{include 'footer.tpl'}
