<?php
require_once "app\View\View.php";

class MarcasView extends View
{
    function showMarcas($marcas){
        
        $this->smarty->assign("marcas", $marcas);
        $this->smarty->display("marcas.tpl");
    }

    function editMarcaForm($marca){
        $this->smarty->assign("marca", $marca);
        $this->smarty->display("editMarcaForm.tpl");
    }
}
