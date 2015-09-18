<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkDayTable extends Migration {

	public function up()
	{
		Schema::create('work_day', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('organization')->unsigned();
			$table->integer('day')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('work_day');
	}
}