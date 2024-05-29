<?php

require_once "app/Controller/homeController.php";
require_once "app/Controller/MarcasController.php";
require_once "app/Controller/CalzadoController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    
    if (empty($_GET['action'])) {       
        $_GET['action'] = 'home';
    }

    $action = $_GET['action'];
    $parametro = explode('/', $action);
   
    switch ($parametro[0]) {
        case 'home':
            $controller = new homeController();
            $controller->showHome();
        break;
        
        case 'Marcas':
            $controller = new MarcasController();
            $controller->showMarcas();
            break;

        case 'Zapatos':
            $controller = new CalzadoController();
            $controller->showCalzado();
            break;

            case 'login':
                $controller = new UserController();
                $controller->showLogin();
                break;
    
    
        case 'logout':
            $controller = new UserController();
            $controller->logout();
            break;
?>
