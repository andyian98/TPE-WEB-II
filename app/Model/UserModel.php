<?php
require_once "./Model.php";

class UserModel extends Model{

    function getUser($email){
        $db = $this->db;
    
        $sentencia = $db->prepare("SELECT * FROM usuario WHERE email = ?");
        $sentencia->execute([$email]);
        $usuario=$sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
}
