<?php

require_once '../Model/CalzadoModel.php';
require_once '../View/marcasView.php';
require_once "../Model/MarcasModel.php";

class marcasController {
    private $calzado_model;
    private $model;
    private $view;

    public function __construct()
    {
        $this->calzado_model = new CalzadoModel();
        $this->model = new MarcasModel();
        $this->view = new MarcasView();
    }

    public function show($params = null)
    {
        if (isset($params)) {
            $marca = $this->model->getById($params[0]);
            if ($marca) {
                $this->view->showDetalle($marca);
            } else {
                $this->view->displayError("Hubo un error: la marca no se encuentra en la base de datos");
            }
        } else {
            $marcas = $this->model->getAll();
            $this->view->showList($marcas);
        }
    }

    public function insert($data)
    {
        if (!empty($_POST["nombre"]) && !empty($data["descripcion"])) {
            $nombre=$data["nombre"];
            $descripcion=$data["descripcion"];
            $this->model->insert($nombre, $descripcion);
            header("Location: " . BASE_URL);
        } else {
            // Hubo un error
        }
    }

    public function update($id = null)
    {
        if (isset($id_marcas) && isset($_POST["nombre"]) && !empty($_POST["nombre"])) {
            $datos_actualizados = [
                "nombre" => $_POST["nombre"],
            ];
            $this->model->insert($id, $datos_actualizados);
        }
        header("Location: " . BASE_URL);
    }

    public function delete($id = null)
    {
        if (isset($id)) {
            $this->calzado_model->deleteById($id);
            $this->model->delete($id);
        }
        header("Location: " . BASE_URL);
    }

    public function showForm($params)
    {
        if (isset($params[0])) {
            $this->view->showForm($params[0]);
        } else {
            $this->view->showForm();
        }
    }
}