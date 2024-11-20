<?php

namespace App\DAOs;

use App\config\DBConect;
use App\DAOs\DAO;
use App\Interfaces\ISerializable;


class saboresDAO extends DAO
{
    static public function crear(ISerializable $serializable): ?array
    {
        $parametros = $serializable->serializar();
        print_r($parametros);
        $sql = "INSERT INTO sabores (id,nombre,descripcion,stock) VALUES (:id,:nombre,:descripcion,:stock)";
        $params = ['id' => $parametros['id'], 'nombre' => $parametros['nombre'], 'descripcion' => $parametros['descripcion'], 'stock' => $parametros['stock']];
        $result = DBConect::write(sql: $sql, params: $params);
        if ($result) {
            return [];
        } else {
            return [];
        }
    }
    static public function listar(): array
    {
        $sql = "SELECT * FROM sabores";
        return DBConect::read(sql: $sql);
    }
    static public function modificar(ISerializable $serializable): ?array
    {
        $parametros = $serializable->serializar();
        $sql = "UPDATE sabores SET nombre =:nombre AND SET descripcion =:descripcion WHERE id =:id";
        $params = [
            "nombre" => $parametros['nombre'],
            "descripcion" => $parametros['descripcion'],
            "id" => $parametros['id']
        ];
        $result = DBConect::write(sql: $sql, params: $params);
        if ($result) {
            return [];
        } else {
            return [];
        }
    }
    static public function borrar(string|int $id): ?array
    {

        $sql = "DELETE FROM sabores WHERE id =:id";
        $params = ['id' => $id];
        $result = DBConect::write(sql: $sql, params: $params);
        if ($result) {
            return [];
        } else {
            return [];
        }
    }
    static public function buscarUno(string|int $id): false|array
    {
        $sql = "SELECT * FROM sabores WHERE id = :id";
        $parametros = ['id' => $id];
        return DBConect::read(sql: $sql, params: $parametros);
    }
}
