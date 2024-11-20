<?php

namespace App\DAOs;

use App\config\DBConect;
use App\DAOs\DAO;
use App\Interfaces\ISerializable;


class productosDAO extends DAO
{
    static public function crear(ISerializable $serializable): ?array
    {
        $parametros = $serializable->serializar();
        print_r($parametros);
        $sql = "INSERT INTO productos (id,nombre,precio,stock) VALUES (:id,:nombre,:precio,:stock)";
        $params = ['id' => $parametros['id'], 'nombre' => $parametros['nombre'], 'precio' => $parametros['precio'], 'stock' => $parametros['stock']];
        $result = DBConect::write(sql: $sql, params: $params);
        if ($result) {
            return [];
        } else {
            return [];
        }
    }
    static public function listar(): array
    {
        $sql = "SELECT * FROM productos";
        return DBConect::read(sql: $sql);
    }
    static public function modificar(ISerializable $serializable): ?array
    {
        $parametros = $serializable->serializar();
        $sql = "UPDATE productos SET nombre =:nombre, precio =:precio WHERE id =:id";
        $params = [
            "id" => $parametros['id'],
            "nombre" => $parametros['nombre'],
            "precio" => $parametros['precio'],

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

        $sql = "DELETE FROM productos WHERE id =:id";
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
        $sql = "SELECT * FROM productos WHERE id = :id";
        $parametros = ['id' => $id];
        return DBConect::read(sql: $sql, params: $parametros);
    }
}
