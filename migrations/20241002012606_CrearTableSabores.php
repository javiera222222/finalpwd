<?php

use App\config\Migrador;


class CrearTableSabores extends Migrador
{

    public function up()
    {


        $sql = "CREATE TABLE sabores (
    `id` int(11) NOT NULL PRIMARY KEY auto_increment,
    `nombre` varchar(50) UNIQUE NOT NULL,
    `descripcion` varchar(500) DEFAULT NULL,
    `stock` int(1) NOT NULL DEFAULT 1
    
);";


        $this->run($sql);
    }


    public function down()
    {
        $sql = "drop table sabores;";
        $this->run($sql);
    }
}
