<?php
require_once "./Model.php";

class MarcasModel extends Model {
    
    function getAll() {
        $db = $this->db;
        $sentencia = $db->prepare("SELECT * FROM marca");
        $sentencia->execute();
        $marca = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $marca;
    }

    function insert($nombre, $descripcion) {
        $db = $this->db;
        $resultado = $db->prepare("INSERT INTO marca (nombre, descripcion) VALUES (?, ?)");
        $resultado->execute([$nombre, $descripcion]);
    }

    function delete($id) {
        $db = $this->db;
        $resultado = $db->prepare("DELETE FROM marca WHERE id_marca = ?");
        $resultado->execute([$id]);
    }
}