<?php
// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

use Directorio\Entities\Negocio;
use Directorio\Entities\User;

class NegocioTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 200) as $index)
		{
            $name_negocio = $faker->company;
            $user = User::create([
               'full_name'  => $faker->name,
               'email'      => $faker->email,
               'password'   => \Hash::make(123456)
            ]);

			Negocio::create([
                'id'                => $user->id,
                'nombre_negocio'    => $name_negocio,
                'slogan_negocio'    => $faker->text(100),
                'descripcion'       => $faker->text(200),
                'website'           => $faker->url,
                'web_fb'            => $faker->url,
                'web_tw'            => $faker->url,
                'rubros_id'         => $faker->randomElement([1,2,3]),
                'movil'             => $faker->phoneNumber,
                'fijo'              => $faker->phoneNumber,
                'email'             => $faker->companyEmail,
                'flag_direccion'    => $faker->randomElement([0,1]),
                'direccion'         => $faker->address(),
                'flag_mapa'         => $faker->randomElement([0,1]),
                'latitud'           => $faker->latitude(),
                'longitud'          => $faker->longitude(),
                'slug'              => \Str::slug($name_negocio)

			]);
		}
	}

}