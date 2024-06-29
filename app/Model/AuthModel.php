<?php 

require_once "app/Model/Model.php";

class AuthModel extends Model {

    function getUser($email){
        $db = $this->createConnection();
       
        //Enviar la consulta
        $sentencia = $db->prepare("SELECT * FROM log_in WHERE email = ?");
        $sentencia->execute([$email]);
        $log_in = $sentencia->fetch(PDO::FETCH_OBJ);
        return $log_in;
    }
}