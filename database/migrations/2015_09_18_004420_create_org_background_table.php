<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrgBackgroundTable extends Migration {

	public function up()
	{
		Schema::create('org_background', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('organization')->unsigned();
			$table->string('path');
			$table->string('title');
		});
	}

	public function down()
	{
		Schema::drop('org_background');
	}
}