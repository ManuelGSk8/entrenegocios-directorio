<?php namespace Directorio\Entities;

class Productos extends \Eloquent {
	protected $fillable = ['id','negocio_id','url_image_350x350','url_image_800x600','titulo'];
}