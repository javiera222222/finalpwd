<?php

declare(strict_types=1);

namespace App\Modelos;

require_once __DIR__ . '/../Interfaces/Iserializable.php';

use DateTime;
use App\Interfaces\Iserializable;


abstract class ModelBase implements ISerializable
{


    public function __construct(
        private ?int $id = 0,
        private string|DateTime $created_at = "now",
        private string|DateTime|null $updated_at = "",

    ) {
        $this->id = $id;
        $this->created_at = $created_at ?? new DateTime($created_at);
        $this->updated_at = $updated_at ?? new DateTime();
    }
    public function serializar(): array
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at instanceof DateTime ? $this->created_at->format('Y-m-d H:i:s') : $this->created_at,
            'updated_at' => $this->updated_at instanceof DateTime ? $this->updated_at->format('Y-m-d H:i:s') : $this->updated_at
        ];
    }

    static function deserializar(array $serializable): self
    {
        [$id, $created_at, $updated_at] = $serializable;
        return new self(id: $id, created_at: $created_at, updated_at: $updated_at);
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function setUpdated_at(string $updated_at): void
    {
        $this->updated_at = new DateTime($updated_at);
    }
}
