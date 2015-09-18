<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizationDetailsTable extends Migration {

	public function up()
	{
		Schema::create('organization_details', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('type')->unsigned();
			$table->integer('address_state')->unsigned();
			$table->integer('address_region')->unsigned();
			$table->string('location_cordinate_lat');
			$table->string('location_cordinate_lan');
			$table->text('description');
			$table->integer('organization')->unsigned();
			$table->integer('appointment_duration');
			$table->integer('appointment_rest');
                        $table->string('phone');
		});
	}

	public function down()
	{
		Schema::drop('organization_details');
	}
}