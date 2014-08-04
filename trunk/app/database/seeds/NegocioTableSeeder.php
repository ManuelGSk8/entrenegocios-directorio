<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class NegocioTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{

            $nombre_negocio = $faker->company;

			Negocio::create([
                'id'                => $index,
                'nombre_negocio'    => $nombre_negocio,
                'slogan_negocio'    => $faker->text(100),
                'descripcion'       => $faker->text(200),
                'website'           => $faker->url,
                'web_fb'            => $faker->url,
                'web_tw'            => $faker->url,
                'rubro_id'          => $faker->randomElement([1,2,3]),
                'slug'              => \Str::slug($nombre_negocio)

			]);
		}
	}

}