<?php

require_once "app/View/ErrorView.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ErrorController{
        private $err;

    public function __construct()
    {
        $this->err = new ErrorView();
    }
    
    function showError($msg){
        $this->err->showError($msg);
    }
}