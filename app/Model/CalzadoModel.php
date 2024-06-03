<?php
require_once "./Model.php";

class CalzadoModel extends Model {
    
    function getAll() {
        $db = $this->db;
        $sentencia = $db->prepare("SELECT * FROM calzado");
        $sentencia->execute();
        $calzado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $calzado;
    }
    public function getById($id_calzado) {
        $db = $this->db;
        $sentencia=$db->prepare('SELECT * FROM calzado WHERE id = ?');
        $sentencia->execute([$id_calzado]);
        $calzado= $sentencia->fetch(PDO::FETCH_OBJ);

        return $calzado;
    }
    function insert($nombre, $tipo, $talle, $precio, $descripcion) {
        $db = $this->db;
        $resultado = $db->prepare("INSERT INTO calzado (nombre, tipo, talle, precio, descripcion) VALUES (?, ?, ?, ?, ?)");
        $resultado->execute([$nombre, $tipo, $talle, $precio, $descripcion]);
    }
    function update($nombre, $tipo, $talle, $precio, $descripcion) {
        $db = $this->db;
        $resultado = $db->prepare("UPDATE calzado SET nombre = ?, tipo = ?, talle = ?, precio = ?, descripcion = ? WHERE id_calzado = ?");
        $resultado->execute([$nombre, $tipo, $talle, $precio, $descripcion]);
    }

    function deleteById($id_calzado) {
        $db = $this->db;
        $resultado = $db->prepare("DELETE FROM calzado WHERE id_calzado = ?");
        $resultado->execute([$id_calzado]);
    }
    function getByMarca($marca) {
        $db = $this->db;
        $sentencia = $db->prepare("SELECT * FROM calzado WHERE marca = ?");
        $sentencia->execute([$marca]);
        $calzado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $calzado;
    }
}