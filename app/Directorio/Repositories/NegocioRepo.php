<?php
namespace Directorio\Repositories;

use Directorio\Entities\Negocio;
use Directorio\Entities\Rubros;

class NegocioRepo extends BaseRepo{

    public function getModel()
    {
        return new Negocio;
    }


    public function listNegocios()
    {
        return Rubros::with([
                'negocios' => function($q){
                        $q->orderBy(\DB::raw('RAND()'))->paginate(2);
                    }
                ,'negocios.productos'])->get();
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

    public function listRegions()
    {
        $deparamentos = \DB::table('ubigeo')->where('id_provincia', '=' , 0)->where('id_distrito', '=',0)
                        ->orderBy('id_departamento', 'asc')->lists('descripcion','id_departamento');

        return $deparamentos;
    }

    public function listProvinces($id_departamento)
    {
        $provincias = \DB::table('ubigeo')->where('id_departamento', '=', $id_departamento)/*->where('id_pronvicia', '!=', 0)*/
                       ->where('id_distrito', '=' ,0)->orderBy('id_provincia', 'asc')->lists('descripcion','id_provincia');

        return $provincias;
    }

    public function listDistrict($id_departamento, $id_pronvicia)
    {
        $distritos = \DB::table('ubigeo')->where('id_departamento', '=', $id_departamento)->where('id_provincia', '=', $id_pronvicia)
                     ->orderBy('id_distrito','asc')->lists('descripcion','id_distrito');

        return $distritos;
    }


} 