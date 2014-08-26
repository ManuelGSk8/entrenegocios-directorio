<?php

namespace Directorio\Managers;


class DatosGeneralesManager  extends BaseManager{

    public function getRules()
    {
        $rules = [
            'nombre_negocio'        => 'required',
            'slogan_negocio'        => 'required',
            'descripcion'           => 'required',
            'rubros_id'             => '',
            'website'               => 'required',
            'fijo'                  => 'required',
            'movil'                 => 'required',
            'email'                 => 'required|email',
            'web_fb'                => '',
            'web_tw'                => '',
            'slug'                  => ''
        ];

        return $rules;
    }



}