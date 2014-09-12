<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Directorio\Entities\Productos;

class ProductosTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 200) as $index)
		{
            $imageSmall = file_get_contents($faker->imageUrl($width = 350, $height = 350));
            $imageLarge = file_get_contents($faker->imageUrl($width = 800, $height = 600));

            $new_name = time().time().str_random(15);
            $path = public_path('upload/img/thumbnail/' . $new_name.'small.jpg');
            $path_normal = public_path('upload/img/img/' . $new_name.'large.jpg');

			Productos::create([
                'id'            => $index,
                'negocio_id'    => $index,
                'url_image_small'     => 'upload/img/thumbnail/' . $new_name.'small.jpg',
                'url_image_large'     => 'upload/img/img/' . $new_name.'large.jpg',
                'perfil'            => true
			]);

            file_put_contents($path, $imageSmall);
            file_put_contents($path_normal, $imageLarge);
		}
	}

}