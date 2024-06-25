<?php

class AuthHelper
{
    static public function checkLogged()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (!isset($_SESSION['IS_LOGGED'])) {
            header('Location: ' . BASE_URL . "login");
            die();
        } else {
            return true;
        }
    }
    static public function isLogged()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (!isset($_SESSION['IS_LOGGED'])) {
            return false;
        } else {
            return true;
        }
    }
    static public function isAdmin()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] === 'admin') {
            return true;
        } else {
            return false;
        }
    }
}