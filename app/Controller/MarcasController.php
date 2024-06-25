<?php

require_once 'app\Model\MarcasModel.php';
require_once 'app\View\MarcasView.php';

class MarcasController
{
    private $model;
    private $view;
    private $err;

    public function __construct()
    {
        $this->model = new MarcasModel();
        $this->view = new MarcasView();
        $this->err = new ErrorView();
    }
    function showMarcas()
    {
        $marcas = $this->model->getAll();
        $this->view->showMarcas($marcas);
    }
    function newMarca()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                !empty($_POST['nombre']) && !empty($_POST['descripcion'])
            ) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $this->model->insertMarca($nombre, $descripcion);
                header("Location:" . BASE_URL . "marca");

            } else {
                $this->err->showError("Faltan datos");
            }
        }
    }
    function deleteMarca($id_marca)
    {
        $this->model->deleteMarca($id_marca);
        header("Location:" . BASE_URL . "marca");
    }
    function editMarca($id_marca)
    {
        $marca = $this->model->getMarca($id_marca);
        $this->view->editMarcaForm($marca);
    }
    function updateMarca()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                !empty($_POST['nombre_e']) && !empty($_POST['descripcion_e'])
            ) {
                $nombre = $_POST['nombre_e'];
                $descripcion = $_POST['descripcion_e'];
                $id_marca = $_POST['id_marca'];
                $this->model->updateMarca($nombre, $descripcion, $id_marca);
                header("Location:" . BASE_URL . "marca");

            } else {
                $this->err->showError("Faltan datos");
            }
        }
    }
}