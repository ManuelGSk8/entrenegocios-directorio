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

            $table->string('nombre_negocio');
            $table->string('slogan_negocio')->nulllable();
            $table->text('descripcion')->nulllable();
            $table->string('website')->nulllable();
            $table->string('web_fb')->nulllable();
            $table->string('web_tw')->nulllable();
            $table->integer('rubros_id')->unsigned();
            $table->foreign('rubros_id')->references('id')->on('rubros')->onDelete('cascade');

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
