<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOAT Streetwear</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="home">GOAT Streetwear</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allCalzados">Ver Calzados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="marcas">Ver Marcas</a>
                    </li>
                    {if !$logged}
                        <li class="nav-item">
                            <a class="nav-link" href="login">Iniciar sesión</a>
                        </li>
                    {else}
                        <li class="nav-item">
                            <a class="nav-link" href="logout">Cerrar sesión</a>
                        </li>
                    {/if}

                </ul>
            </div>
        </div>
    </nav>
