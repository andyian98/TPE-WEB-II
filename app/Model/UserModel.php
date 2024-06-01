<?php
require_once "app/Model/Model.php"

class UserModel extends Model{

    function getUser($email){
        $db = $this->createConexion();
    
        $sentencia = $db->("SELECT * FROM usuario WHERE email = ?");
        $sentencia->execute([$email])
        $usuario=$sentencia->(PDO::FETCH_OBJ);
        return $usuario;
    }
}
?>
