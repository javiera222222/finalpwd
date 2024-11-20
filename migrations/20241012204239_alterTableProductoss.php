<?php

use App\config\Migrador;

class AlterTableProductoss extends Migrador
{
    /**
     * Do the migration
     */
    public function up()
    {

        $sql = "ALTER TABLE  productos ADD  `created_at` datetime NOT NULL default now(),
        ADD  `updated_at` datetime DEFAULT NULL";
        $this->run($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {

        $sql = "alter table productos drop table `created_at` and drop table `updated_at`";
        $this->run($sql);
    }
}
