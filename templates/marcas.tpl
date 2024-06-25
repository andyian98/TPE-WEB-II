{include 'header.tpl'}

{if $admin == true}
{include "addMarcaForm.tpl"}
{/if}

{foreach $marcas as $marca }
         <div class='card' style='width: 45rem;'>
         <img src=img/logo.png class="logo">
               
                <div class='card-body'>
                    <h5 class='card-title'>{$marca->nombre}</h5>
                    <p class='card-text'>Descripción: {$marca->descripcion}</p>
                    <a href='calzadoPorMarca/{$marca->id_marca}' class='btn btn-secondary'>Ver calzados</a>
                </div>
                {if $admin == true}
                <a href='deleteMarca/{$marca->id_marca}' class='btn btn-secondary'>Eliminar</a>
                <a href='editMarca/{$marca->id_marca}' class='btn btn-secondary'>Editar</a>
                {/if}
                </div>
{/foreach}

{include 'footer.tpl'}