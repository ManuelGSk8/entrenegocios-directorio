<?php
/**
 * Created by PhpStorm.
 * User: mgoicochea
 * Date: 20/08/14
 * Time: 02:27 PM
 */

namespace Directorio\Repositories;
use Directorio\Entities\Productos;

class ProductoRepo  extends BaseRepo{

    public function getModel()
    {
        return new Productos;
    }

    public function newProducto()
    {
        $producto = new Productos();
        return $producto;
    }

    public function findProducto($id)
    {
        $producto = Productos::find($id);

        return $producto;
    }
} 