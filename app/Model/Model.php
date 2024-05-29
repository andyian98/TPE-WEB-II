
<?php
require_once "config.php";

class Model{

    protected $conexion; 



    public function __construct(){
        $this->conexion=$this->createConexion();
        $this->deploy();
    }


    function createConexion(){
        try{
            $db=new PDO("mysql:host=".MYSQL.";charset")
            $this->createOrUseDatabase($db);        
} catch(Exception $e){
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

return $db;
}

private function createOrUseDatabase($db){
    $query = $db->query("SHOW DATABASES LIKE '".MYSQL_DB."'");
    $databaseExists = $query->rowCount() > 0;

    if(!$databaseExists) {
        $db->query("CREATE DATABASE ".MYSQL_DB."");
    }

    $db->query("USE ".MYSQL_DB."");
}

private function deploy() {
$this->createTables();           
}

private function createTables() {
$sql = "CREATE TABLE IF NOT EXISTS`marca` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` text NOT NULL
        PRIMARY KEY (`id`)
        );
        
        CREATE TABLE IF NOT EXISTS `calzado` (
  `id_calzado` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `talle` int(2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `id_marca` int(11) NOT NULL
        PRIMARY KEY (`id`)
        )

        CREATE TABLE IF NOT EXISTS `log_in` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `rol` varchar(10) NOT NULL
        PRIMARY KEY (`id`)
        );
        ";

$this->conexion->query($sql);
}
}
        }
    }



















































































?>























