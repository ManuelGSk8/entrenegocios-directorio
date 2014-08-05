<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Directorio\Entities\Productos;

class ProductosTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
			Productos::create([
                'id'            => $index,
                'negocio_id'    => $index,
                'url_image'     => $faker->imageUrl($width = 350, $height = 350),
                'descripcion'   => $faker->text(100)
			]);
		}
	}

}