<?php

use App\config\Migrador;
use App\helpers\CreateSecurePassword as Password;

class addUsuario extends Migrador
{
    /**
     * Do the migration
     */
    public function up()
    {

        $password = $this->createdPass();

        $sql = "INSERT INTO usuario (username, email, password)
        VALUES
            ('javiera', 'javiera@gmail.com', '$password[1]' );";
        $this->run($sql);
    }


    public function down()
    {
        $sql = "TRUNCATE TABLE users";
        $this->run($sql);
    }
    public function createdPass(): array
    {
        $password = [];
        for ($i = 0; $i < 21; $i++) {
            $password[$i] = Password::crear("password $i");
        }
        return $password;
    }
}
