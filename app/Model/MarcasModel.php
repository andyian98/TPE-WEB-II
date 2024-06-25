<?php
require_once "app\Model\Model.php";

class MarcasModel extends Model {
    
    function getAll() {
        $db = $this->createConnection();
        $sentencia = $db->prepare("SELECT * FROM marca");
        $sentencia->execute();
        $marca = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $marca;
    }
    function getById($id_marca) {
        $db = $this->createConnection();
        $sentencia = $db->prepare("SELECT * FROM marca WHERE id = ?");
        $sentencia->execute([$id_marca]);
        $marca = $sentencia->fetch(PDO::FETCH_OBJ);
        return $marca;
    }
    function insertMarca($nombre, $descripcion) {
        $db = $this->createConnection();
        $resultado = $db->prepare("INSERT INTO marca (nombre, descripcion) VALUES (?, ?)");
        $resultado->execute([$nombre, $descripcion]);
    }
    function updateMarca($id_marca, $nombre, $descripcion) {
        $db = $this->createConnection();
        $resultado = $db->prepare("UPDATE marca SET nombre = ?, descripcion = ? WHERE id_marca = ?");
        $resultado->execute([$id_marca, $nombre, $descripcion]);
    }
    function deleteMarca($id_marca) {
        $db = $this->createConnection();
        $resultado = $db->prepare("DELETE FROM marca WHERE id_marca = ?");
        $resultado->execute([$id_marca]);
    }
    function getMarca($id_marca){
            $db = $this->createConnection();
            $sentencia = $db->prepare("SELECT * FROM marca WHERE id_marca = ?");
            $sentencia->execute([$id_marca]);
            $marca = $sentencia->fetch(PDO::FETCH_OBJ);
            return $marca;
    }
}