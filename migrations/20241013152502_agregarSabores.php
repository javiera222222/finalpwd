<?php

use App\config\Migrador;

class agregarSabores extends Migrador
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO sabores (id, nombre, descripcion, stock) VALUES
        (1, 'crema chantilly', 'Suave crema batida con un toque de dulzura', 1),
        (2, 'crema vainilla', 'Delicado sabor a vainilla con textura cremosa', 1),
        (3, 'frutilla a la crema', 'Mezcla de fresas frescas con crema', 1),
        (4, 'cereza a la crema', 'Crema suave con un toque de cereza', 1),
        (5, 'crema del cielo', 'Cremoso y suave, con un toque celestial', 1),
        (6, 'coco cero', 'Coco fresco con una textura ligera y sin azúcar', 1),
        (7, 'praline de almendras', 'Almendras caramelizadas en una base cremosa', 1),
        (8, 'banana split', 'Clásico sabor a banana con un toque de chocolate', 1),
        (9, 'granizado', 'Helado de crema con finas virutas de chocolate', 1),
        (10, 'menta granizada', 'Menta refrescante con granizado de chocolate', 1),
        (11, 'dulce de leche', 'Dulce de leche clásico y cremoso', 1),
        (12, 'dulce de leche granizado', 'Dulce de leche con trozos de chocolate', 1),
        (13, 'super dulce de leche', 'Más intenso y cremoso que el clásico', 1),
        (14, 'dulce de leche con nueces', 'Dulce de leche con crujientes trozos de nueces', 1),
        (15, 'dulce de leche la escaloneta', 'Edición especial con un toque argentino', 1),
        (16, 'chocolate', 'Intenso sabor a chocolate', 1),
        (17, 'chocolate blanco', 'Dulce y cremoso, con el sabor del chocolate blanco', 1),
        (18, 'chocolate al rhum', 'Chocolate con un toque de ron', 0),
        (19, 'mousse de chocolate', 'Textura ligera de mousse con sabor a chocolate', 1),
        (20, 'chocobom', 'Crema de chocolate con combones', 1),
        (21, 'selva negra', 'Chocolate con trozos de cereza y crema', 1),
        (22, 'frutos del bosque', 'Combinación de frutos rojos patagonicos', 1),
        (23, 'mascarpone', 'Cremoso y suave con un toque de queso italiano y frutos rojos', 1),
        (24, 'sambayon', 'Sabor a base de yema de huevo y vino Marsala', 1),
        (25, 'sambayon granizado', 'Sambayón con virutas de chocolate', 0),
        (26, 'oreo', 'Cremoso con trozos de galleta Oreo', 1),
        (27, 'mantecol', 'Sabor a maní y turrón típico argentino', 1),
        (28, 'kinder', 'Chocolate suave inspirado en el clásico Kinder', 1),
        (29, 'cadbury', 'Chocolate cremoso de la marca Cadbury', 1),
        (30, 'capitan del espacio', 'Inspirado en el famoso alfajor argentino', 1),
        (31, 'brownie', 'Mezcla de chocolate con trozos de brownie', 1),
        (32, 'bombon rocher', 'Inspirado en el clásico bombón con avellanas', 1),
        (33, 'tramontana', 'Helado de dulce de leche con galleta y chocolate', 1),
        (34, 'crema rusa', 'Sabor a crema con un toque suave de nuez', 1),
        (35, 'limon', 'Refrescante y ácido sabor a limón', 1),
        (36, 'frutilla', 'Dulce sabor a fresas frescas', 1),
        (37, 'naranja', 'Cítrico y refrescante sabor a naranja', 1),
        (38, 'banana', 'Dulce y suave sabor a banana ', 1)
    ";

        $this->run($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {

        $sql = "TRUNCATE TABLE sabores";
        $this->run($sql);
    }
}
