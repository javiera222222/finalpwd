<?php

namespace App\Controllers;

require_once __DIR__ . '/controllerBase.php';

use App\Controllers\controllerBase;
use App\Modelos\productos;

use App\DAOs\productosDAO;


class productosController extends ControllerBase
{




    static public function create(array $params): ?array
    {
        $productos = new productos(id: null, nombre: $params['nombre'], precio: $params['precio'], stock: 1,);

        return productosDAO::crear(serializable: $productos);
    }
    static public function update(array $params): ?array
    {
        $productos = productos::deserializar($params);
        return productosDAO::modificar($productos);
    }
    static public function destroy(int $id): ?array
    {
        return productosDAO::borrar($id);
    }

    static public function read(): ?array
    {
        return productosDAO::listar();
    }
    static public function findOne(string|int $id): false |array
    {
        return productosDAO::buscarUno($id);
    }
}
