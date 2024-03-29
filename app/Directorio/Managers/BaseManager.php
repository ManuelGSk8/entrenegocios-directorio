<?php
namespace Directorio\Managers;


abstract class BaseManager {

    protected $entity;
    protected $data;
    protected $errors;

    public function __construct($entity, $data)
    {
        $this->entity = $entity;
        $this->data = array_only($data, array_keys($this->getRules()));

    }

    abstract public function getRules();

    public function isValid()
    {
        $rules = $this->getRules();

        $validation = \Validator::make($this->data, $rules);

        $isValid = $validation->passes();
        $this->errors = $validation->messages();

        return $isValid;

    }


    public function save_user()
    {
        if(! $this->isValid())
        {
            return false;
        }
        else
        {
            $data = [
                'full_name'     => $this->data['full_name'],
                'email'         => $this->data['email'],
                'password'      => \Hash::make($this->data['password'])
            ];
            $this->entity->fill($data);
            $this->entity->save();
        }
        return true;
    }

    public function save()
    {
        if(! $this->isValid())
        {
            return false;
        }
        else{
            $this->entity->fill($this->data);
            $this->entity->save();
        }
        return true;
    }


    public function getErrors()
    {
        return $this->errors;
    }


} 