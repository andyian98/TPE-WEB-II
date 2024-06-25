
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GOAT Streetwear</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calzado">Ver Calzados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="marca">Ver Marcas</a>
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
