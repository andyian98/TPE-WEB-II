<?php
require_once "../View/view.php";

class MarcasView extends View {
    function showMarcas($marcas){
        
        $this->smarty->assign("marcas", $marcas);
        $this->smarty->display("htmlMarcas.tpl");
    }
