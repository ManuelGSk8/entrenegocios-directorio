<?php
namespace Directorio\Repositories;

use Directorio\Entities\Negocio;

class NegocioRepo extends BaseRepo{

    public function getModel()
    {
        return new Negocio;
    }

    public function newNegocio($id)
    {
        $negocio = Negocio::find($id);

        if($negocio != null)
        {
           return $negocio;
        }
        else
        {
            $negocio = new Negocio();
            return $negocio;
        }
    }


} 