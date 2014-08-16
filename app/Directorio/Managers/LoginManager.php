<?php


namespace Directorio\Managers;


class LoginManager extends BaseManager{

    public function getRules()
    {
        $rules = [
            'email'                 => 'required|email|',
            'password'              => 'required'
        ];

        return $rules;
    }


} 