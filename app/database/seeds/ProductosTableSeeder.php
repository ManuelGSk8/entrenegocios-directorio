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
                'url_image_350x350'     => $faker->imageUrl($width = 350, $height = 350),
                'url_image_800x600'     => $faker->imageUrl($width = 800, $height = 600),
                'descripcion'   => $faker->text(100)
			]);
		}
	}

}