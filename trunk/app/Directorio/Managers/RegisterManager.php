<?php

namespace Directorio\Managers;


class RegisterManager  extends BaseManager{


    public function getRules()
    {
        $rules = [
            'full_name'             => 'required',
            'email'                 => 'required|email|unique:user,email',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        return $rules;
    }

} 