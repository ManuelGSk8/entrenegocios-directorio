<?php
namespace Directorio\Repositories;

use Directorio\Entities\Negocio;

class NegocioRepo {

    public function find($id)
    {
        return Negocio::find($id);
    }
} 