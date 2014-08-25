<?php
/**
 * Created by PhpStorm.
 * User: ManuelG
 * Date: 23/08/14
 * Time: 12:43 AM
 */

namespace Directorio\Managers;


class UbicationManager extends BaseManager{


    public function getRules()
    {
        $rules = [
            'flag_direccion'    => '',
            'direccion'         => 'required',
            'departamento'      => 'required|not_in:0',
            'provincia'         => 'required|not_in:0',
            'distrito'          => 'required|not_in:0',
            'flag_mapa'          => '',
            'latitud'           => '',
            'longitud'          => ''
        ];

        return $rules;
    }


} 