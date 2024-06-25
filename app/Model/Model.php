<?php
require_once "config.php";

class Model {

    protected $connection;
    
    public function __construct()
    {
        $this->connection = $this->createConnection();
        $this->deploy();
    }

    function createConnection(){
        try {
            $db = new PDO("mysql:host=".MYSQL_HOST.";charset=utf8", MYSQL_USER, MYSQL_PASSWORD);
           
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
        $password = "admin";
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "
            CREATE TABLE IF NOT EXISTS `calzado` (
            `id_calzado` int(11) NOT NULL,
            `nombre` varchar(20) NOT NULL,
            `tipo` varchar(20) NOT NULL,
            `talle` int(2) NOT NULL,
            `precio` decimal(10,2) NOT NULL,
            `descripcion` text NOT NULL,
            `id_marca` int(11) NOT NULL
            );

            CREATE TABLE IF NOT EXISTS `log_in` (
            `id_usuario` int(11) NOT NULL,
            `email` varchar(20) NOT NULL,
            `password` varchar(50) NOT NULL
            );

            CREATE TABLE IF NOT EXISTS `marca` (
            `id_marca` int(11) NOT NULL,
            `nombre` varchar(20) NOT NULL,
            `descripcion` text NOT NULL
            );

            INSERT INTO `log_in` (`id_usuario`, `email`, `password`) VALUES
            (1, 'webadmin', 'admin');

            ALTER TABLE `calzado`
            ADD PRIMARY KEY (`id_calzado`),
            ADD UNIQUE KEY `fk_calzado_marca` (`id_marca`) USING BTREE;

            ALTER TABLE `log_in`
            ADD PRIMARY KEY (`id_usuario`);

            ALTER TABLE `marca`
            ADD PRIMARY KEY (`id_marca`);

            ALTER TABLE `calzado`
            MODIFY `id_calzado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

            ALTER TABLE `log_in`
            MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

            ALTER TABLE `marca`
            MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

            ALTER TABLE `calzado`
            ADD CONSTRAINT `calzado_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON UPDATE CASCADE;
            COMMIT;
            ";

            $this->connection->query($sql);
        }
    }
