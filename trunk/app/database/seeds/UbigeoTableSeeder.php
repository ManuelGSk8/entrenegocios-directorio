<?php

use Directorio\Entities\Ubigeo;

class UbigeoTableSeeder extends Seeder {

	public function run()
	{

        Ubigeo::create([
            'id_departamento'   => 1,
            'id_provincia'      => 0,
            'id_distrito'       => 0,
            'descripcion'       => 'Lima'
        ]);

            Ubigeo::create([
                'id_departamento'   => 1,
                'id_provincia'      => 1,
                'id_distrito'       => 0,
                'descripcion'       => 'Lima'
            ]);

                Ubigeo::create([
                    'id_departamento'   => 1,
                    'id_provincia'      => 1,
                    'id_distrito'       => 0,
                    'descripcion'       => 'Lima'
                ]);

            Ubigeo::create([
                'id_departamento'   => 1,
                'id_provincia'      => 2,
                'id_distrito'       => 0,
                'descripcion'       => 'Huaral'
            ]);

            Ubigeo::create([
                'id_departamento'   => 1,
                'id_provincia'      => 3,
                'id_distrito'       => 0,
                'descripcion'       => 'Cañete'
            ]);

        Ubigeo::create([
            'id_departamento'   => 2,
            'id_provincia'      => 0,
            'id_distrito'       => 0,
            'descripcion'       => 'Arequipa'
        ]);

        Ubigeo::create([
            'id_departamento'   => 3,
            'id_provincia'      => 0,
            'id_distrito'       => 0,
            'descripcion'       => 'Chiclayo'
        ]);
	}

}