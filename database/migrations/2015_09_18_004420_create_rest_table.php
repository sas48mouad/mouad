<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestTable extends Migration {

	public function up()
	{
		Schema::create('rest', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->time('timefrom');
			$table->time('timeto');
			$table->integer('organization')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('rest');
	}
}