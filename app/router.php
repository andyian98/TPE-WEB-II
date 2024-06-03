<?php
require_once '../app/controllers/calzadosController.php';
require_once './app/controllers/marcasController.php';
require_once './app/controllers/authenticationController.php';
require_once './app/helpers/authenticationHelper.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

function parseUrl($url)
{

    $params = explode("/", $url);

    $arrayReturn["action"] = $params[0] != "" ? $params[0] : "calzados";
    $arrayReturn["filtro"] = isset($_GET["filtro"]) && $_GET["filtro"] != "" ? $_GET["filtro"] : false;
    $arrayReturn["method"] = $_SERVER["REQUEST_METHOD"];

    $arrayReturn["params"] = isset($params[1]) && $params[1] != "" ? array_slice($params, 1) : null;
    return $arrayReturn;
}

$action = $_GET["action"];
$action_array = parseUrl($action);

switch ($action_array["action"]) {

    case 'calzados':
        $controller = new calzadosController();
        switch ($action_array["method"]) {
            case 'GET':
                $controller->show($action_array["params"], $action_array["filtro"]);
                break;
            default:
                header("Location: " . BASE_URL);
                break;
        }
        break;

    case 'marcas':
        $controller = new marcasController();
        switch ($action_array["method"]) {
            case 'GET':
                $controller->show($action_array["params"]);
                break;
            default:
                header("Location: " . BASE_URL);
                break;
        }
        break;

    case "deleteCalzado":
        authenticationHelper::verify();
        $controller = new calzadosController();
        if (isset($action_array["params"])) {
            $controller->delete($action_array["params"][0]);
        } else {
            header("Location: " . BASE_URL);
        }
        break;

    case "deleteMarca":
        authenticationHelper::verify();
        $controller = new marcasController();
        if (isset($action_array["params"])) {
            $controller->delete($action_array["params"][0]);
        } else {
            header("Location: " . BASE_URL);
        }
        break;

    case 'login':
        $controller = new authenticationController();
        $controller->showLogin();
        break;

    case 'logout':
        $controller = new authenticationController();
        $controller->logout();
        break;

    case 'formCalzados':
        authenticationHelper::verify();
        $controller = new calzadosController();

        switch ($action_array["method"]) {
            case 'GET':
                $controller->showForm($action_array["params"]);
                break;
            case "POST":
                if (isset($action_array["params"])) {
                    $controller->update($action_array["params"][0]);
                } else {
                    $controller->insert();
                }
                break;
            default:
                header("Location: " . BASE_URL);
                break;
        }
        break;

    case 'formMarcas':
        authenticationHelper::verify();
        $controller = new marcasController();

        switch ($action_array["method"]) {
            case 'GET':
                $controller->showForm($action_array["params"]);
                break;
            case "POST":
                if (isset($action_array["params"])) {
                    $controller->update($action_array["params"][0]);
                } else {
                    $controller->insert();
                }
                break;
            default:
                header("Location: " . BASE_URL);
                break;
        }
        break;

    case 'auth':
        $controller = new authenticationController();
        $controller->auth();
        break;
    default:
        echo "404 Page Not Found";
        break;
}