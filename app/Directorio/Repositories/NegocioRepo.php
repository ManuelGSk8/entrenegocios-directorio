<?php
namespace Directorio\Repositories;

use Directorio\Entities\Negocio;

class NegocioRepo extends BaseRepo{

    public function getModel()
    {
        return new Negocio;
    }
} 