<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizationAccountTable extends Migration {

	public function up()
	{
		Schema::create('organization_account', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('username');
			$table->string('password', 60);
			$table->string('email', 255);
			$table->integer('creator_admin')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('organization_account');
	}
}