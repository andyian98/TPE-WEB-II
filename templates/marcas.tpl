{include 'header.tpl'}

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="row">
    <div class="col">
      {if $admin == true}
        {include "addMarcaForm.tpl"}
      {/if}

      <div class="row row-cols-1 row-cols-md-3 g-4">
        {foreach $marcas as $marca}
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{$marca->nombre}</h5>
                <p class="card-text">{$marca->descripcion}</p>
                <a href='calzadoByMarca/{$marca->id_marca}' class='btn btn-secondary'>Ver calzados</a>
                {if $admin == true}
                  <a href='deleteMarca/{$marca->id_marca}' class='btn btn-secondary'>Eliminar</a>
                  <a href='editMarca/{$marca->id_marca}' class='btn btn-secondary'>Editar</a>
                {/if}
              </div>
            </div>
          </div>
        {/foreach}
      </div>

    </div>
  </div>
</div>

{include 'footer.tpl'}
