<?php
require_once "View.php";

class AuthView extends View {
  function showLogin($msg = ''){
    $this->smarty->assign("msg", $msg);
    $this->smarty->display('login.tpl');
  }
}
