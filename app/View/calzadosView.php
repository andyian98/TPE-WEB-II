
<?php
require_once "View.php";

class CalzadosView extends View {
    function showCalzados($marcas, $calzados) { 
        $this->smarty->assign("calzados", $calzados);
        $this->smarty->assign("marcas", $marcas);
        $this->smarty->display("allCalzados.tpl");
    }

    function showCalzadoByMarca($calzadoByMarca) {
        $this->smarty->assign("calzadoByMarca", $calzadoByMarca);
        $this->smarty->display("calzadosByMarca.tpl");
    }

    function showCalzado($calzado) {
        $this->smarty->assign("calzado", $calzado);
        $this->smarty->display("calzado.tpl");
    }

    function showAddFormMarca($marcas) {
        $this->smarty->assign("marcas", $marcas);
        $this->smarty->display("addCalzadoForm.tpl");
    }

    function editCalzadoForm($calzado, $marcas) {
        $this->smarty->assign("marcas", $marcas);
        $this->smarty->assign("calzado", $calzado);
        $this->smarty->display("editCalzadoForm.tpl");
    }
}
