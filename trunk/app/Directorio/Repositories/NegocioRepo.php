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
        /*
        $listaNegocio = Rubros::with([
                'negocios' => function($q){
                        $q->orderBy(\DB::raw('RAND()'));
                    }
                ,'negocios.productos' => function($p){
                    $p->where('productos.perfil','=',true);
                }])->orderBy(\DB::raw('RAND()'))->paginate(5);
        */
        /*
 ->select('negocio.id', 'negocio.nombre_negocio','negocio.web_fb','negocio.web_tw','negocio.website',
                                 'negocio.descripcion','negocio.slug','categoria.descripcion AS rubDescripcion','productos.url_image_small')

        ->paginate(4,['negocio.id', 'negocio.nombre_negocio','negocio.web_fb','negocio.web_tw','negocio.website',
                        'negocio.descripcion','negocio.slug','categoria.descripcion AS rubDescripcion','productos.url_image_small'])
        */

        $ip=$_SERVER['REMOTE_ADDR'];
        $hour=date("H");
        $day=date("j");
        $month=date("n");
        $ip=str_replace(".","",$ip);
        $seed=($ip+$hour+$day+$month);

         $listaNegocio = \DB::table('negocio')
                        ->join('rubros',function($joinR)
                         {
                           $joinR->on('negocio.rubros_id', '=' , 'rubros.id');
                         })
                        ->join('productos', function($joinP)
                         {
                             $joinP->on('productos.negocio_id', '=', 'negocio.id');
                         })
                        ->orderBy(\DB::raw('RAND('.$seed.')'))
                        ->where('productos.perfil', '=', true)->paginate(52,['negocio.id', 'negocio.nombre_negocio','negocio.web_fb',
                        'negocio.web_tw','negocio.website','negocio.descripcion','negocio.slug','rubros.descripcion AS rubDescripcion',
                        'productos.url_image_small','rubros.slug AS rubSlug', 'rubros.id AS rubId']);

        return  $listaNegocio;

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