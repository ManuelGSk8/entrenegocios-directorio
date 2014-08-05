<?php

use Directorio\Entities\Rubros;

class RubrosTableSeeder extends Seeder {

	public function run()
	{

        Rubros::create([
            'id'            => 1,
            'descripcion'   => 'Pateleria y dulces',
            'slug'          => 'pasteleria-y-dulces'
        ]);

        Rubros::create([
            'id'            => 2,
            'descripcion'   => 'Comidas y parrilladas',
            'slug'          => 'comidas-y-parrilladas'
        ]);

        Rubros::create([
            'id'            => 3,
            'descripcion'   => 'regalos personalizado',
            'slug'          => 'regalos-personalizado'
        ]);
	}

}