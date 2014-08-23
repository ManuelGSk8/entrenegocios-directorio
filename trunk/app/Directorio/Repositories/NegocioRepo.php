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
        //$negocio = Negocio::find($id);
        $negocio = \DB::table('negocio')->where('user_id', '=' , $id)->get();

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