<?php

require_once "app/View/HomeView.php";

class HomeController{
    private $view;

    public function __construct(){
        $this->view = new HomeView();
    }

    function showHome(){
        $this->view->showHome();
    }
}