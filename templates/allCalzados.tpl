{include 'header.tpl'}

{if $admin == true}
{include 'addCalzadoForm.tpl'}
{/if}

<div class="containerFlex">

  {foreach $calzados as $item}

    <div>
      <ul class="containerList">
        <li class="list-group-item articles">{$item->nombre}</li>
        <li class="list-group-item articles">{$item->tipo}</li>
        <li class="list-group-item articles">Talle:{$item->talle}</li>
        <li class="list-group-item articles">${$item->precio}</li>
        <li class="list-group-item articles">{$item->descripcion}</li>
        <img src="img/{$item->imagen}" alt="{$item->nombre}" class="imgCalzado">
        <li class="list-group-item articles" value="{$item->id_marca}">{$item->nombre}</li>
        <a href='calzado/{$item->id_calzado}' class='btn btn-secondary'>Ver</a>
        {if $admin == true}
          <a href='deleteCalzado/{$item->id_calzado}' class='btn btn-secondary'><button>Eliminar</button></a>
          <a href='editCalzado/{$item->id_calzado}' class='btn btn-secondary'><button>Editar</button></a>
        {/if}
        </ul>
      </div>
  {/foreach}
</div>

{include 'footer.tpl'}