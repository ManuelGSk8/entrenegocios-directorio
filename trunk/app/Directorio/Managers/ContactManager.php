<?php

namespace Directorio\Managers;


class ContactManager extends BaseManager{

    public function getRules()
    {
        $rules = [
            'id'             => '',
            'fijo'           => 'required',
            'movil'          => 'required',
            'email'          => 'required|email',
            'web_fb'         => '',
            'web_tw'         => ''
        ];

        return $rules;
    }

} 