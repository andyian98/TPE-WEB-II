<?php
require_once "app/Model/Model.php";

class CalzadoModel extends Model {

    function getAll() {
        $db = $this->createConnection();
        $sentencia = $db->prepare("SELECT * FROM calzado");
        $sentencia->execute();
        $calzados = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $calzados;
    }

    public function getCalzado($id_calzado) {
        $db = $this->createConnection();
        $sentencia = $db->prepare('SELECT c.*, m.nombre AS nombre_marca, m.descripcion AS descripcion_marca FROM calzado c JOIN marca m ON c.id_marca = m.id_marca WHERE c.id_calzado = ?');
        $sentencia->execute([$id_calzado]);
        $calzado = $sentencia->fetch(PDO::FETCH_OBJ);
        return $calzado;
    }

    function getCalzadoByMarca($id_marca){
        $db = $this->createConnection();
        $sentencia = $db->prepare("SELECT * FROM calzado WHERE id_marca = ?");
        $sentencia->execute([$id_marca]);
        $calzados = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $calzados;
    }

    function getCalzadoEdit($id_calzado){
        $db = $this->createConnection();
        $sentencia = $db->prepare("SELECT * FROM calzado WHERE id_calzado = ?");
        $sentencia->execute([$id_calzado]);
        $calzado = $sentencia->fetch(PDO::FETCH_OBJ);
        return $calzado;
    }

    function addCalzado($nombre, $tipo, $talle, $precio, $descripcion, $id_marca, $imagen = null) {
        $db = $this->createConnection();
        $resultado = $db->prepare("INSERT INTO calzado (nombre, tipo, talle, precio, descripcion, imagen, id_marca) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $resultado->execute([$nombre, $tipo, $talle, $precio, $descripcion, $imagen, $id_marca]);
    }

    function updateCalzado($id_calzado, $nombre, $tipo, $talle, $precio, $descripcion, $id_marca) {
        $db = $this->createConnection();
        $resultado = $db->prepare("UPDATE calzado SET nombre = ?, tipo = ?, talle = ?, precio = ?, descripcion = ?, id_marca = ? WHERE id_calzado = ?");
        $resultado->execute([$nombre, $tipo, $talle, $precio, $descripcion, $id_marca, $id_calzado]);
    }

    function deleteCalzado($id_calzado) {
        $db = $this->createConnection();
        $resultado = $db->prepare("DELETE FROM calzado WHERE id_calzado = ?");
        $resultado->execute([$id_calzado]);
    }

    public function getMAndC() {
        $db = $this->createConnection();
        $sentencia = $db->prepare("SELECT c.*, m.nombre AS nombre_marca, m.descripcion AS descripcion_marca FROM calzado c JOIN marca m ON c.id_marca = m.id_marca");
        $sentencia->execute();
        $calzados = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $calzados;
    }
}
