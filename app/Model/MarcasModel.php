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

    function getById($id_marca) {
        $db = $this->db;
        $sentencia = $db->prepare("SELECT * FROM marca WHERE id = ?");
        $sentencia->execute([$id_marca]);
        $marca = $sentencia->fetch(PDO::FETCH_OBJ);
        return $marca;
    }

    function insert($nombre, $descripcion) {
        $db = $this->db;
        $resultado = $db->prepare("INSERT INTO marca (nombre, descripcion) VALUES (?, ?)");
        $resultado->execute([$nombre, $descripcion]);
    }

    function update($id_marca, $nombre, $descripcion) {
        $db = $this->db;
        $resultado = $db->prepare("UPDATE marca SET nombre = ?, descripcion = ? WHERE id_marca = ?");
        $resultado->execute([$id_marca, $nombre, $descripcion]);
    }

    function deleteById($id_marca) {
        $db = $this->db;
        $resultado = $db->prepare("DELETE FROM marca WHERE id_marca = ?");
        $resultado->execute([$id_marca]);
    }
}