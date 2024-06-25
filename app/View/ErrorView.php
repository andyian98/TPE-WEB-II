<?php
require_once "app\View\View.php";

class ErrorView extends View{

    function showError($msg){
        $this->smarty->assign("msg", $msg);
        $this->smarty->display("error.tpl");
    }
}