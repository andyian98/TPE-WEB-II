<?php
require_once "TPE/Model/Model.php"

class CalzadoModel extends Model{


    function getAll(){
        
        $db=$this->createConexion();
        $sentencia=$db->prepare(SELECT * FROM calzado)
        $sentencia->execute()
        $calzados=$sentencia->(PDO::FETCH_OBJ);
        
        return $calzados;
    }




     
    function insert($nombre, $tipo, $talle, $precio, $descripcion, $marca){
        $db = $this->createConexion();

        $resultado= $db->prepare("INSERT INTO calzado (nombre, tipo, talle, precio, descripcion) VALUES (?,?,?)");
        $resultado->execute([$nombre, $descr, $prioridad]); 
    }
    
    
    function delete($id){
        $db = $this->createConexion();
        $resultado= $db->prepare("DELETE FROM calzado WHERE id = ?");
        $resultado->execute([$id]); 
    }
    
    function getByMarca($marca){
        $db = $this->createConexion();
        $sentencia = $db->prepare("SELECT * FROM calzado WHERE marca = ?");
        $sentencia->execute([$marca]);
        $marca = $sentencia->fetch(PDO::FETCH_OBJ);
        return $marca;
    }
   
}