<?php
require_once "config.php";

class Model{

    protected $db; 

    public function __construct(){
        $this->db=new PDO('mysql:host=' . MYSQL_HOST . 'dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASSWORD);
        $this->deploy();
    }

    function deploy(){
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll(); //devuelve las tablas de la bbdd
        $aux= '$n0D';
        if(count($tables)==0){
            $sql =<<<END
            -- Table structure for table `calzado`
            --

            CREATE TABLE `calzado` (
            `id_calzado` int(11) NOT NULL,
            `nombre` varchar(20) NOT NULL,
            `tipo` varchar(20) NOT NULL,
            `talle` int(2) NOT NULL,
            `precio` decimal(10,2) NOT NULL,
            `descripcion` text NOT NULL,
            `id_marca` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `calzado`
            --

            INSERT INTO `calzado` (`id_calzado`, `nombre`, `tipo`, `talle`, `precio`, `descripcion`, `id_marca`) VALUES
            (1, 'Air Jordan 5 Retro S', 'Sneaker', 42, 350000.00, 'El Air Jordan 5 Retro SE Sail está elaborado con ante blanco roto en la parte superior, con detalles heredados de AJ5, como cierres de encaje, ojales moldeados de TPU y red de paneles laterales transpirables. Un Jumpman bordado en negro adorna el talón trasero y la lengüeta de espuma expuesta. La configuración de amortiguación incluye una entresuela de poliuretano blanco, equipada con una unidad Air-sole en el talón y acentuada con detalles dentados de tiburón moteados en negro. Una suela de goma translúcida proporciona tracción adhesiva debajo del pie.', 3),
            (2, 'Rayssa Leal x Dunk L', 'Sneaker', 37, 263000.00, 'Nike presenta una edición en colaboración con la skater brasileña Rayssa Leal. Con Swooshes azules y fucsias disparejos en la parte superior, estos skeakers cuentan con una base de cuero blanco con superposiciones de ante gris con patrones. El logo personal de Rayssa adorna el talón lateral y el mismo diseño se repite en relieve a lo largo de cada panel lateral. En la parte inferior, una suela de goma proporciona un agarre óptimo.', 1),
            (3, 'Wmns Samba OG White ', 'Sneaker', 35, 175000.00, 'Este calzado presenta una parte superior de cuero blanco con una superposición de ante gris en la punta. Detalles de cuero negro aparecen en la parte trasera. Impresa en la lengüeta, la etiqueta azul de Adidas le añade un toque vibrante de color. Una suela de goma ofrece una pisada estable y baja al suelo.', 2);

            -- --------------------------------------------------------

            --
            -- Table structure for table `log_in`
            --

            CREATE TABLE `log_in` (
            `id_usuario` int(11) NOT NULL,
            `email` varchar(20) NOT NULL,
            `password` varchar(50) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `log_in`
            --

            INSERT INTO `log_in` (`id_usuario`, `email`, `password`) VALUES
            (1, 'webadmin', 'admin');

            -- --------------------------------------------------------

            --
            -- Table structure for table `marca`
            --

            CREATE TABLE `marca` (
            `id_marca` int(11) NOT NULL,
            `nombre` varchar(20) NOT NULL,
            `descripcion` text NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `marca`
            --

            INSERT INTO `marca` (`id_marca`, `nombre`, `descripcion`) VALUES
            (1, 'Nike', 'Líder mundial en calzado y ropa deportiva, conocida por su innovación y diseño.'),
            (2, 'Adidas', 'Marca reconocida por su enfoque en el rendimiento y la calidad en la moda deportiva.'),
            (3, 'Air Jordan', 'Línea de calzado y ropa deportiva lanzada en colaboración con Michael Jordan, icónica figura en la cultura del basketball.');

            --
            -- Indexes for dumped tables
            --

            --
            -- Indexes for table `calzado`
            --
            ALTER TABLE `calzado`
            ADD PRIMARY KEY (`id_calzado`),
            ADD UNIQUE KEY `fk_calzado_marca` (`id_marca`) USING BTREE;

            --
            -- Indexes for table `log_in`
            --
            ALTER TABLE `log_in`
            ADD PRIMARY KEY (`id_usuario`);

            --
            -- Indexes for table `marca`
            --
            ALTER TABLE `marca`
            ADD PRIMARY KEY (`id_marca`);

            --
            -- AUTO_INCREMENT for dumped tables
            --

            --
            -- AUTO_INCREMENT for table `calzado`
            --
            ALTER TABLE `calzado`
            MODIFY `id_calzado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

            --
            -- AUTO_INCREMENT for table `log_in`
            --
            ALTER TABLE `log_in`
            MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

            --
            -- AUTO_INCREMENT for table `marca`
            --
            ALTER TABLE `marca`
            MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

            --
            -- Constraints for dumped tables
            --

            --
            -- Constraints for table `calzado`
            --
            ALTER TABLE `calzado`
            ADD CONSTRAINT `calzado_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON UPDATE CASCADE;
            COMMIT;
            END;
            $this->db->query($sql);
        }
    }
}