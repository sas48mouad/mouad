<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttachmentTable extends Migration {

	public function up()
	{
		Schema::create('attachment', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('appointment')->unsigned();
			$table->string('path');
			$table->string('title');
		});
	}

	public function down()
	{
		Schema::drop('attachment');
	}
}