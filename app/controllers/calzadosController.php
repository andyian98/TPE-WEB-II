<?php
require_once '../Model/CalzadoModel.php';
require_once '../View/calzadosView.php';
require_once '../Model/MarcasModel.php';

$calzado_model = new CalzadoModel();
$id_calzado = $_GET['id'];
$data = $calzado_model->getById($id_calzado);

class calzadosController{
    private $calzado_model;
    private $model;
    private $view;

    public function __construct() {
        $this->marcas_model = new MarcasModel();
        $this->model = new CalzadoModel();
        $this->view = new CalzadosView();
    }

    public function show($params = null, $filtro = false) {
        if(isset($params)){
            $calzado = $this->model->getById($params[0]);
            if($calzado){
                $marca = $this->marcas_model->getById($calzado->genero);
                $calzado->marca = $marca->nombre;
                $this->view->showDetalle($calzado);
            } else {
                $this->view->displayError("Hubo un error: el calzado no se encuentra en la base");
            }
        } else {
            if($filtro){
                $calzados = $this->calzado_model->getByMarca($filtro);
            } else {
                $calzados = $this->calzado_model->getAll();
            }
            $marcas = $this->marcas_model->getAll();
            $this->view->showList([ "calzados" => $calzados, "marcas" => $marcas]);
        }
    }
    public function insert(){
        if(!empty($_POST["nombre"]) && !empty($_POST["tipo"]) && !empty($_POST["talle"]) && !empty($_POST["precio"]) && !empty($_POST["descripcion"]) ){
            $this->model->insert($_POST);
        }
        else {
            // hubo un error
        }
        header("Location: ".BASE_URL);
    }
    public function update($id_calzado = null){
        if(isset($id_calzado) && !empty($_POST["nombre"]) && !empty($_POST["tipo"]) && !empty($_POST["talle"]) && !empty($_POST["precio"]) && !empty($_POST["descripcion"]) ){
            $this->model->insert($id_calzado, $_POST);
        }
        else {
            // hubo un error
        }
        header("Location: ".BASE_URL);
    }

    public function delete($id_calzado=null){
        if(isset($id_calzado)){
            $this->model->deleteById($id_calzado);
        }
        header("Location: ".BASE_URL);
    }
    public function showForm($params){
        $marcas = $this->marcas_model->getAll();

        if(isset($params[0])){
            $this->view->showForm($params[0],$marcas);
        } else {
            $this->view->showForm(null, $marcas);
        }
    }
}