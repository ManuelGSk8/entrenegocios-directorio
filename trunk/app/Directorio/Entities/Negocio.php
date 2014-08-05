<?php namespace Directorio\Entities;


class Negocio extends \Eloquent {

    protected $table = 'negocio';
	protected $fillable = [];

    public function productos()
    {
        return $this->hasMany('Directorio\Entities\Productos');
    }
}