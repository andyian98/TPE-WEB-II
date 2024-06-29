{include 'header.tpl'}

{if $admin == true}
  {include 'addCalzadoForm.tpl'}
{/if}

<div class="calzado">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    {foreach $calzados as $item}
      <div class="col">
        <div class="card">
          <img src="images/{$item->imagen}" class="card-img-top imgCalzado" alt="{$item->nombre}">
          <div class="card-body">
            <h5 class="card-title">{$item->nombre}</h5>
            <p class="card-text"><b>Tipo:</b> {$item->tipo}</p>
            <p class="card-text"><b>Talle:</b> {$item->talle}</p>
            <p class="card-text"><b>Precio:</b> $ {$item->precio}</p>
            <p class="card-text"><b>Descripción:</b> {$item->descripcion}</p>
            <p class="card-text"><b>Marca:</b> {$item->nombre_marca}</p>
            <a href='calzado{$item->id_calzado}' class='btn btn-secondary'>Ver</a>
            {if $admin == true}
              <a href='deleteCalzado/{$item->id_calzado}' class='btn btn-secondary'><button>Eliminar</button></a>
              <a href='editCalzadoForm/{$item->id_calzado}' class='btn btn-secondary'><button>Editar</button></a>
            {/if}
          </div>
        </div>
      </div>
    {/foreach}
  </div>
</div>

{include 'footer.tpl'}
