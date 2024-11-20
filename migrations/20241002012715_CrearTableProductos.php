<?php


use App\config\Migrador;


class CrearTableProductos extends Migrador
{

    public function up()
    {

        $sql = "CREATE TABLE productos (
            `id` int(11) NOT NULL PRIMARY KEY auto_increment,
          `nombre`   varchar(50) unique not null,
          `precio`   int not null,
          `stock` int(1) NOT NULL default 1,
         
            );";
        $this->run($sql);
    }

    public function down()
    {
        $sql = "drop table productos;";
        $this->run($sql);
    }
}
