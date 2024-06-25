<?php
require_once 'app\Controller\HomeController.php';
require_once 'app\Model\MarcasModel.php';
require_once 'app\Controller\AuthController.php';
require_once 'app\Controller\CalzadosController.php';
require_once 'app/Controller/ErrorController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    
    if (empty($_GET['action'])) {       
        $_GET['action'] = 'home';
    }

    $action = $_GET['action'];
    $parametro = explode('/', $action);
   
    switch ($parametro[0]) {
        case 'home':
            $controller = new HomeController();
            $controller->showHome();
        break;
        case 'marcas':
            $controller = new MarcasController();
            $controller->showMarcas();
            break;
        case 'calzadoByMarca':
            $controller = new CalzadosController();
            $controller->showCalzadoByMarca($parametro[1]);
            break;
        case 'addMarca':
            $controller = new MarcasController();
            $controller->newMarca();
            break;
        case 'deleteMarca':
            $controller = new MarcasController();
            $controller->deleteMarca($parametro[1]);
            break;
        case 'editMarca':
            $controller = new MarcasController();
            $controller->editMarca($parametro[1]);
            break;
        case 'updateMarca':
            $controller = new MarcasController();
            $controller->updateMarca();
            break;
        case 'calzados':
            $controller = new CalzadosController();
            $controller->showCalzados();
            break;
        case 'calzado':
            $controller = new CalzadosController();
            $controller->showCalzado($parametro[1]);
            break;
        case 'editCalzado':
            $controller = new CalzadosController();
            $controller->editCalzado($parametro[1]);
            break;
        case 'updateCalzado':
            $controller = new CalzadosController();
            $controller->updateCalzado();
            break;
        case 'deleteCalzado':
            $controller = new CalzadosController();
            $controller->deleteCalzado($parametro[1]);
            break;
        case 'addCalzado':
            $controller = new CalzadosController();
            $controller->addCalzado();
            break;
        case 'login':
            $controller = new AuthController();
            $controller->showLogin();
            break;
        case 'verify':
            $controller = new AuthController();
            $controller->verify();
            break;
        case 'logout':
            $controller = new AuthController();
            $controller->logout();
                break;
        case 'hash':
            password_hash ($password, PASSWORD_DEFAULT);  
            break;
        default:
            $err = new ErrorController();
            $err->showError("404 not found");
    }