<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSystemUserTable extends Migration {

	public function up()
	{
		Schema::create('system_user', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user')->unsigned();
			$table->integer('role')->unsigned();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('system_user');
	}
}