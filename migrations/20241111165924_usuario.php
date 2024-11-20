<?php

use App\config\DBConect;
use App\config\Migrador;

class usuario extends Migrador
{
    /**
     * Do the migration
     */
    public function up()

    {
        $sql = "CREATE TABLE usuario (
        `id` int(11) NOT NULL auto_increment primary key,
        `created_at` datetime NOT NULL default now(),
        `updated_at` datetime DEFAULT NULL,
        `is_active` int(1) NOT NULL default 1,
        `username`  varchar(100) not null unique,
        `email` varchar(255) not null unique,
        `password` varchar(255) not null
        );";
        $this->run($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table users;";
        $this->run($sql);
    }
}
