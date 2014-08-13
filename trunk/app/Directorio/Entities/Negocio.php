<?php namespace Directorio\Entities;


class Negocio extends \Eloquent {

    protected $table = 'negocio';
	protected $fillable = [];

    public function user()
    {
        return $this->hasOne('Directorio\Entities\User','id','id');
    }

    public function productos()
    {
        return $this->hasMany('Directorio\Entities\Productos');
    }


}