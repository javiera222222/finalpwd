<?php

use App\config\Migrador;

class agregarProductos extends Migrador
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO productos (id,nombre,precio,stock) VALUES
        (1,'vaso chico',2500,1),
         (2,'vaso grande',3500,1),
          (3,'cono chico',2800,1),
           (4,'cono mediano',3200,1),
            (5,'cono grande',5000,1),
             (6,'milkshake chico',3200,1),
              (7,'milkshake grande',3500,1),
               (8,'cuarto',6000,1),
                (9,'medio',10000,1),
                (10,'kilo',18500,1) ";
        $this->run($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {

        $sql = "TRUNCATE TABLE productos";
        $this->run($sql);
    }
}
