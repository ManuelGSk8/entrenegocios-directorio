<?php

namespace Directorio\Managers;


class DatosGeneralesManager  extends BaseManager{

    public function getRules()
    {
        $rules = [
            'negocio_id'            =>'',
            'nombre_negocio'        => 'required',
            'slogan_negocio'        => 'required',
            'rubros_id'             => '',
            'descripcion'           => 'required',
            'website'               => 'required',
            'slug'                  => ''
        ];

        return $rules;
    }



}