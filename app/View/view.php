<?php

require_once "libs/Smarty.class.php";
require_once "app/helpers/AuthHelper.php";

class View {
    protected $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign("base", BASE_URL);
        $this->smarty->assign("logged", AuthHelper::isLogged());
        $this->smarty->assign("admin", AuthHelper::isAdmin());
    }
}