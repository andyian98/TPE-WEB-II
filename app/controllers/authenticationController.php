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

    public function auth(){
        $email=$_POST['email'];
        $password=$_POST['password'];

        if(empty($email) || empty($password)){
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        // busco el usuario
        $user = $this->model->getByEmail($email);
        if ($user && password_verify($password, $user->password)) {
            // Usuario autenticado correctamente
            authenticationHelper::login($user);
            header('Location: ' . BASE_URL);
        } else {
            // Usuario o contraseña inválidos
            $this->view->showLogin('Usuario o contraseña inválidos');
        }
    }

    public function logout() {
        authenticationHelper::logout();
        header('Location: ' . BASE_URL);    
    }
}
