<?php namespace Directorio\Entities;


class Negocio extends \Eloquent {

    protected $table = 'negocio';
	protected $fillable = ['id','nombre_negocio','slogan_negocio','descripcion','website','web_fb','web_tw','rubros_id','movil','fijo','email','flag_direccion','direccion','flag_mapa','latitud','longitud','slug'];


    public function user()
    {
        return $this->hasOne('Directorio\Entities\User','id','user_id');
    }

    public function productos()
    {
        return $this->hasMany('Directorio\Entities\Productos');
    }


}