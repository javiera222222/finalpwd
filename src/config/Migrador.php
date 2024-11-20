<?php

declare(strict_types=1);

namespace App\config;

use Phpmig\Migration\Migration;

class Migrador extends Migration
{
    public function run(string $sql)
    {
        $container = $this->getContainer();
        /** @var PDO */
        $db = $container['db'];
        $statement = $db->query($sql);
        $statement->closeCursor();
    }
}
