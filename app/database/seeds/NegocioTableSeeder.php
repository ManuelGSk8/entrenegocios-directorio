<?php
// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

use Directorio\Entities\Negocio;

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
                'rubros_id'         => $faker->randomElement([1,2,3]),
                'movil'             => $faker->phoneNumber,
                'fijo'              => $faker->phoneNumber,
                'mail'              => $faker->email,
                'flag_direccion'    => $faker->randomElement([0,1]),
                'direccion'         => $faker->address(),
                'flag_mapa'         => $faker->randomElement([0,1]),
                'latitud'           => $faker->latitude(),
                'longitud'          => $faker->longitude(),
                'slug'              => \Str::slug($nombre_negocio)

			]);
		}
	}

}