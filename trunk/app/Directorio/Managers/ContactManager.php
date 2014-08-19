<?php

namespace Directorio\Managers;


class ContactManager extends BaseManager{

    public function getRules()
    {
        $rules = [
            'id'             => '',
            'fijo'           => 'required',
            'movil'          => 'movil',
            'email'          => 'email',
            'web_fb'         => 'web_fb',
            'web_tw'         => 'web_tw'
        ];
    }

} 