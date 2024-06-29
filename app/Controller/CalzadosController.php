<?php

require_once 'app/Model/CalzadoModel.php';
require_once 'app/View/CalzadosView.php';
require_once 'app/Model/MarcasModel.php';
require_once 'app/View/ErrorView.php';

class CalzadosController{
    private $model;
    private $view;
    private $err;
    private $marcasModel;

    public function __construct() {
        $this->model = new CalzadoModel();
        $this->view = new CalzadosView();
        $this->marcasModel = new MarcasModel();
        $this->err = new ErrorView();
    }

    function showCalzados($id_calzado = null){
        $marcas = $this->marcasModel->getAll();
        $calzados = $this->model->getMAndC();
        $this->view->showCalzados($marcas, $calzados);
    }

    function showCalzado($id_calzado){
        $calzado = $this->model->getCalzado($id_calzado);
        $this->view->showCalzado($calzado);
    }

    function showCalzadoByMarca($id_marca){
        $calzadosPorMarca = $this->model->getCalzadoByMarca($id_marca);
        $this->view->showCalzadoByMarca($calzadosPorMarca);
    }

    function deleteCalzado($id_calzado){
        $this->model->deleteCalzado($id_calzado);
        header("Location:" . BASE_URL . "calzado");
        exit;
    }

    public function addCalzado(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                !empty($_POST['nombre']) && !empty($_POST['tipo']) &&
                isset($_POST['talle']) && !empty($_POST['precio']) &&
                !empty($_POST['descripcion']) && isset($_POST['id_marca'])
            ) {
                $nombre = $_POST['nombre'];
                $tipo = $_POST['tipo'];
                $talle = $_POST['talle'];
                $precio = $_POST['precio'];
                $descripcion = $_POST['descripcion'];
                $id_marca = $_POST['id_marca'];
                $imagen = $_POST['imagen'];

                if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"){
                    $imagen = $_FILES['imagen']['name'];
                    $tmp_name = $_FILES['imagen']['tmp_name'];
                    $destination = "img/" . $imagen;
                    
                    if (move_uploaded_file($tmp_name, $destination)) {
                        $this->model->addCalzado($nombre, $tipo, $talle, $precio, $descripcion, $id_marca, $imagen);
                        header("Location: " . BASE_URL . "calzado");
                    }else{
                        $this->err->showError("Hubo un error al mostrar la imagen");
                        }
                }else{
                    $this->model->addCalzado($nombre, $tipo, $talle, $precio, $descripcion, $id_marca, $imagen);
                    header("Location: " . BASE_URL . "calzado");
                }   
            }else{
                $this->err->showError("Faltan datos");
            }
        }else{
            $this->err->showError("Error de servidor");
            }
              
    }

    function editCalzadoForm($id_calzado)
    {
        $marcas = $this->marcasModel->getAll();
        $calzado = $this->model->getCalzadoEdit($id_calzado);
        $this->view->editCalzadoForm($calzado, $marcas);
    }

    function updateCalzado(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                !empty($_POST['nombre']) && !empty($_POST['tipo']) &&
                isset($_POST['talle']) && !empty($_POST['precio']) &&
                !empty($_POST['descripcion'])
            ) {
                $nombre = $_POST['nombre'];
                $tipo = $_POST['tipo'];
                $talle = $_POST['talle'];
                $precio = $_POST['precio'];
                $descripcion = $_POST['descripcion'];
                $id_calzado = $_POST['id_calzado'];
                $id_marca = $_POST['id_marca'];

                $this->model->updateCalzado($id_calzado, $nombre, $tipo, $descripcion, $talle, $precio, $id_marca);
                header("Location:" . BASE_URL . "calzado");
                exit;

            } else {
                $this->err->showError("Faltan datos");
            }
        }
    }
}
