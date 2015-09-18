<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizationServiceTable extends Migration {

	public function up()
	{
		Schema::create('organization_service', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('service')->unsigned();
			$table->integer('organization')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('organization_service');
	}
}