<?php

class authenticationHelper {
    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($email) {
        authenticationHelper::init();
        $_SESSION['USER_ID'] = $email->id_usuario;
        $_SESSION['USER_USER'] = $email->User;
    }

    public static function logout() {
        authenticationHelper::init();
        session_destroy();
    }

    public static function verify() {
        authenticationHelper::init();
        if(!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . '/login');
            die();
        }
    }
}