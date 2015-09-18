<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	public function up()
	{
		Schema::create('user', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('email');
			$table->string('password', 60);
			$table->rememberToken('rememberToken');
			$table->softDeletes();
			$table->integer('type');
			$table->string('username');
		});
	}

	public function down()
	{
		Schema::drop('user');
	}
}