<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizationRoleTable extends Migration {

	public function up()
	{
		Schema::create('organization_role', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
		});
	}

	public function down()
	{
		Schema::drop('organization_role');
	}
}