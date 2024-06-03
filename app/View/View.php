<?php
require_once "libs/Smarty.class.php"
require_once "helpers/authenticationHelpers.php"

class View{
    protected $smarty
    
    
    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign("base", BASE_URL);
        $this->smarty->assign("logged", authenticationHelpers::isLogged());
        $this->smarty->assign("admin", authenticationHelpers::isAdmin());


    }
}




?>