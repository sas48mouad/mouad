<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizationTypeTable extends Migration {

	public function up()
	{
		Schema::create('organization_type', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
		});
	}

	public function down()
	{
		Schema::drop('organization_type');
	}
}