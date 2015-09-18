<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRoleTable extends Migration {

	public function up()
	{
		Schema::create('user_role', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
		});
	}

	public function down()
	{
		Schema::drop('user_role');
	}
}