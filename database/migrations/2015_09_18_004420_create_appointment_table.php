<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentTable extends Migration {

	public function up()
	{
		Schema::create('appointment', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('organization')->unsigned();
			$table->date('date');
			$table->string('time');
			$table->integer('civil_id');
			$table->string('phone')->nullable();
			$table->string('email')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('appointment');
	}
}