<?php

require_once "app\View\ErrorView.php";

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