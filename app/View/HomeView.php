<?php
require_once "View.php";

class HomeView extends View{
    function showHome(){
        $this->smarty->display("home.tpl");
    }
}