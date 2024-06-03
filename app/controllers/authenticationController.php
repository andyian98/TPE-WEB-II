<?php
require_once '../View/authenticationView.php';
require_once '../Model/UserModel.php';
require_once '../helpers/authenticationHelper.php';

class authenticationController {
    private $view;
    private $model;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new authenticationView();
    }

    public function showLogin(){
        $this->view->showLogin();
    }

    public function validateUser(){
        $email = $_POST['user'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)){
            $this->view->showLogin("Hay datos sin completar");
            return;
        }

        $email = $this->model->getByUser($email);

        if($email && password_verify($password, $email->password)){
            authenticationHelper::login($email);
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin('Correo inválido');
        }
    }

    public function logout(){
        authenticationHelper::logout();
        header('Location: ' . BASE_URL . '/home');
    }
}