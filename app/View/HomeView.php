<?php
require_once "app\View\View.php";

class HomeView extends View{
    function showHome(){
        $this->smarty->display("home.tpl");
    }
}