<?php
require_once "./Model.php";

class CalzadoModel extends Model {
    
    function getAll() {
        $db = $this->db;
        $sentencia = $db->prepare("SELECT * FROM calzado");
        $sentencia->execute();
        $calzados = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $calzados;
    }

    function insert($nombre, $tipo, $talle, $precio, $descripcion, $marca) {
        $db = $this->db;
        $resultado = $db->prepare("INSERT INTO calzado (nombre, tipo, talle, precio, descripcion, marca) VALUES (?, ?, ?, ?, ?, ?)");
        $resultado->execute([$nombre, $tipo, $talle, $precio, $descripcion, $marca]);
    }

    function delete($id) {
        $db = $this->db;
        $resultado = $db->prepare("DELETE FROM calzado WHERE id_calzado = ?");
        $resultado->execute([$id]);
    }

    function getByMarca($marca) {
        $db = $this->db;
        $sentencia = $db->prepare("SELECT * FROM calzado WHERE marca = ?");
        $sentencia->execute([$marca]);
        $calzados = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $calzados;
    }

}