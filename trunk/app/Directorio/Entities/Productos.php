<?php namespace Directorio\Entities;

class Productos extends \Eloquent {
	protected $fillable = ['id','negocio_id','url_image_small','url_image_large','titulo','perfil'];
}