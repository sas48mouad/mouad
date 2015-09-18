<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizationUserTable extends Migration {

	public function up()
	{
		Schema::create('organization_user', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('organization')->unsigned();
			$table->integer('user')->unsigned();
			$table->integer('role')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('organization_user');
	}
}