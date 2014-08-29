<?php namespace Directorio\Entities;

class Rubros extends \Eloquent {
    protected $fillable = [];

    public function negocios()
    {
        return $this->hasMany('Directorio\Entities\Negocio');
    }




}