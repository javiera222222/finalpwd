<?php

namespace App\modelos;

use App\Modelos\ModelBase;

require_once __DIR__ . '/../Modelos/ModelBase.php';




class sabores extends ModelBase
{

    public function __construct(
        private ?int $id = 0,
        private ?string $nombre,
        private string $descripcion,
        private int $stock,
        string $created_at = "now",
        string $updated_at = "",
    ) {
        parent::__construct(
            id: $id,
            created_at: $created_at,
            updated_at: $updated_at,
        );

        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
    }



    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }


    public function getDescripcion(): string
    {
        return $this->descripcion;
    }
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }


    public function getStock(): string
    {
        return $this->stock;
    }
    public function setStock(string $stock): void
    {
        $this->stock = $stock;
    }

    public function serializar(): array
    {
        $serializado = array_merge(get_object_vars($this), parent::serializar());

        return $serializado;
    }

    static function deserializar(array $serializable): self
    {
        return new Self(
            id: (int)$serializable['id'],
            nombre: $serializable['nombre'],
            descripcion: $serializable['descripcion'],
            stock: $serializable['stock'] ?? 1,
            created_at: $serializable['created_at'],
            updated_at: $serializable['updated_at'] ?? ""

        );
    }
}
