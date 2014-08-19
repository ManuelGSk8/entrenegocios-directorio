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
        /*$rubros = Rubros::all()->get('id','descripcion');*/
        $rubros = \DB::table('rubros')->orderBy('id', 'asc')->lists('descripcion','id');

        return $rubros;

    }

} 