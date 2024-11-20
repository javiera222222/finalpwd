<?php

namespace App\Controllers;


use App\Modelos\sabores;

use App\DAOs\saboresDAO;


class saboresController extends ControllerBase
{





    static public function create(array $params): ?array
    {
        $sabores = new sabores(id: null, nombre: $params['nombre'], descripcion: $params['descripcion'], stock: 1,);
        return saboresDAO::crear(serializable: $sabores);
    }
    static public function update(array $params): ?array
    {
        $sabores = sabores::deserializar($params);
        return saboresDAO::modificar($sabores);
    }
    static public function destroy(int $id): ?array
    {
        return saboresDAO::borrar($id);
    }

    static public function read(): ?array
    {
        return saboresDAO::listar();
    }
    static public function findOne(string|int $id): false |array
    {
        return saboresDAO::buscarUno($id);
    }
}
