<?php
namespace Directorio\Repositories;

use Directorio\Entities\Rubros;

class RubroRepo extends BaseRepo{

    public function getModel()
    {
        return new Rubros;
    }

    public function getAllRubros()
    {
        /*$categoria = Rubros::all()->get('id','descripcion');*/
        $rubros = \DB::table('rubros')->orderBy('id', 'asc')->lists('descripcion','id');

        return $rubros;

    }

    public function getRubrobyId($id)
    {

        return Rubros::find($id);
    }

    public function getNegociobyRubro($idRubro)
    {

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
            ->where('productos.perfil', '=', true)
            ->where('rubros.id', '=', $idRubro)->paginate(52,['negocio.id', 'negocio.nombre_negocio','negocio.web_fb',
                'negocio.web_tw','negocio.website','negocio.descripcion','negocio.slug','rubros.descripcion AS rubDescripcion',
                'productos.url_image_small','rubros.slug AS rubSlug', 'rubros.id AS rubId']);

        return $listaNegocio;

    }

} 