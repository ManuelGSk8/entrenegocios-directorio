<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUbigeoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ubigeo', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_departamento');
            $table->integer('id_provincia');
            $table->integer('id_distrito');
            $table->string('descripcion');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ubigeo');
	}

}
