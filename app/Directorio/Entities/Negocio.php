<?php namespace Directorio\Entities;


class Negocio extends \Eloquent {

    protected $table = 'negocio';
	protected $fillable = ['id','user_id','nombre_negocio','slogan_negocio','descripcion','website','web_fb','web_tw','rubros_id','movil','fijo','email','flag_direccion','direccion','departamento','provincia','distrito','flag_mapa','latitud','longitud','slug'];


    public function productos()
    {
        return $this->hasMany('Directorio\Entities\Productos');
    }


}