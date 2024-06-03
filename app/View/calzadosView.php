
<?php
require_once "../View/View.php";

class CalzadosView extends View {

  function showCalzados($calzados){ 

    $this->smarty->assign("calzados", $calzados);
    $this->smarty->display("htmlCalzados.tpl");
}
}
?>
