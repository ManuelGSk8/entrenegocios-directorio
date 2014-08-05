<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('RubrosTableSeeder');
        $this->call('NegocioTableSeeder');
        $this->call('ProductosTableSeeder');
		// $this->call('UserTableSeeder');

	}

}
