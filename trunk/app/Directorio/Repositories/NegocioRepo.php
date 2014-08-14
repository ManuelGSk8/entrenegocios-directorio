<?php
namespace Directorio\Repositories;

use Directorio\Entities\Negocio;
use Directorio\Entities\User;

class NegocioRepo extends BaseRepo{

    public function getModel()
    {
        return new Negocio;
    }

    public function newNegocio()
    {
        $user = new User();

        return $user;
    }
} 