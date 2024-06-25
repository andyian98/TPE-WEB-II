<?php
require_once 'libs/Smarty.class.php';

class AuthView {
  private $smarty;

  function __construct() {
    $this->smarty = new Smarty();
    $this->smarty->template_dir = 'templates';
    $this->smarty->compile_dir = 'templates_c';
  }
  function showLogin($msg = null)
  {
    $this->smarty->assign("msg", $msg);
    $this->smarty->display('login.phtml');
  }
}
