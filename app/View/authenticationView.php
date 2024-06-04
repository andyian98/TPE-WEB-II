<?php

class authenticationView {
  function showLogin($msj = null)
  {
    
    
    $this->smarty->assign("msj", $msj);
    $this->smarty->display('login.phtml');

 

  }
}
