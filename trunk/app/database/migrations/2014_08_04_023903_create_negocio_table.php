<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNegocioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('negocio', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nombre_negocio')->nullable();
            $table->string('slogan_negocio')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('website')->nullable();
            $table->string('web_fb')->nullable();
            $table->string('web_tw')->nullable();
            $table->integer('rubros_id')->unsigned();
            $table->foreign('rubros_id')->references('id')->on('rubros')->onDelete('cascade');
            $table->string('movil')->nullable();
            $table->string('fijo')->nullable();
            $table->string('email')->nullable();
            $table->boolean('flag_direccion')->nullable();
            $table->string('direccion')->nullable();
            $table->string('departamento',2)->nullable();
            $table->string('provincia',2)->nullable();
            $table->string('distrito',2)->nullable();
            $table->boolean('flag_mapa')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();

            $table->string('slug');

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
		Schema::drop('negocio');
	}

}
