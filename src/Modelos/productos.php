<?php

namespace App\modelos;

use App\Modelos\ModelBase;

require_once __DIR__ . '/../Modelos/ModelBase.php';




class productos extends ModelBase
{

    public function __construct(
        private ?int $id = 0,
        private ?string $nombre,
        private int $precio,
        private int $stock,
        string $created_at = "now",
        string $updated_at = "now",
    ) {
        parent::__construct(
            id: $id,
            created_at: $created_at,

        );

        $this->nombre = $nombre;
        $this->precio = $precio;
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


    public function getPrecio(): string
    {
        return $this->precio;
    }
    public function setPrecio(string $precio): void
    {
        $this->precio = $precio;
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
        $serializado = array_merge(parent::serializar(), [
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'stock' => $this->stock
        ]);
        json_encode($serializado);


        return $serializado;
    }

    static function deserializar(array $serializable): self
    {
        return new Self(
            id: (int)$serializable['id'],
            nombre: $serializable['nombre'],
            precio: $serializable['precio'],
            stock: $serializable['stock'] ?? 1,
            created_at: $serializable['created_at'],
            updated_at: $serializable['updated_at'] ?? ""

        );
    }
}
