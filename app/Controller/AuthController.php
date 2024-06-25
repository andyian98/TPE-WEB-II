<?php
require_once 'app\View\AuthView.php';
require_once 'app\Model\AuthModel.php';

class AuthController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->view = new AuthView();
        $this->model = new AuthModel();
    }

    function showLogin()
    {
        $this->view->showLogin();
    }

    function verify()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $log_in = $this->model->getUser($email);

                if ($log_in && password_verify($password, $log_in->password)) {

                    session_start();
                    $_SESSION['IS_LOGGED'] = true;
                    $_SESSION['USERNAME'] = $log_in->email;
                    $_SESSION['ROLE'] = $log_in->rol;
                    
                    header("Location:" . BASE_URL . "tasks");
                    die();
                } else {
                    $this->view->showLogin("Usuario incorrecto");
                }
            } else {
                $this->view->showLogin("Faltan datos obligatorios");
            }
        }
    }

    function logout()
    {
        session_start();
        session_destroy();
        header("Location:" . BASE_URL . "login");
        die();
    }
}

