<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('system_user', function(Blueprint $table) {
			$table->foreign('user')->references('id')->on('user')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('system_user', function(Blueprint $table) {
			$table->foreign('role')->references('id')->on('user_role')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('organization_account', function(Blueprint $table) {
			$table->foreign('creator_admin')->references('id')->on('system_user')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('organization_details', function(Blueprint $table) {
			$table->foreign('type')->references('id')->on('organization_type')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('organization_details', function(Blueprint $table) {
			$table->foreign('address_state')->references('id')->on('oman_state')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('organization_details', function(Blueprint $table) {
			$table->foreign('address_region')->references('id')->on('oman_region')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('organization_details', function(Blueprint $table) {
			$table->foreign('organization')->references('id')->on('organization_account')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('organization_user', function(Blueprint $table) {
			$table->foreign('organization')->references('id')->on('organization_account')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('organization_user', function(Blueprint $table) {
			$table->foreign('user')->references('id')->on('user')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('organization_user', function(Blueprint $table) {
			$table->foreign('role')->references('id')->on('organization_role')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('rest', function(Blueprint $table) {
			$table->foreign('organization')->references('id')->on('organization_account')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('work_day', function(Blueprint $table) {
			$table->foreign('organization')->references('id')->on('organization_account')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('work_day', function(Blueprint $table) {
			$table->foreign('day')->references('id')->on('day')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('appointment', function(Blueprint $table) {
			$table->foreign('organization')->references('id')->on('organization_account')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('organization_service', function(Blueprint $table) {
			$table->foreign('service')->references('id')->on('service')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('organization_service', function(Blueprint $table) {
			$table->foreign('organization')->references('id')->on('organization_account')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('attachment', function(Blueprint $table) {
			$table->foreign('appointment')->references('id')->on('appointment')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('org_background', function(Blueprint $table) {
			$table->foreign('organization')->references('id')->on('organization_account')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('system_user', function(Blueprint $table) {
			$table->dropForeign('system_user_user_foreign');
		});
		Schema::table('system_user', function(Blueprint $table) {
			$table->dropForeign('system_user_role_foreign');
		});
		Schema::table('organization_account', function(Blueprint $table) {
			$table->dropForeign('organization_account_creator_admin_foreign');
		});
		Schema::table('organization_details', function(Blueprint $table) {
			$table->dropForeign('organization_details_type_foreign');
		});
		Schema::table('organization_details', function(Blueprint $table) {
			$table->dropForeign('organization_details_address_state_foreign');
		});
		Schema::table('organization_details', function(Blueprint $table) {
			$table->dropForeign('organization_details_address_region_foreign');
		});
		Schema::table('organization_details', function(Blueprint $table) {
			$table->dropForeign('organization_details_organization_foreign');
		});
		Schema::table('organization_user', function(Blueprint $table) {
			$table->dropForeign('organization_user_organization_foreign');
		});
		Schema::table('organization_user', function(Blueprint $table) {
			$table->dropForeign('organization_user_user_foreign');
		});
		Schema::table('organization_user', function(Blueprint $table) {
			$table->dropForeign('organization_user_role_foreign');
		});
		Schema::table('rest', function(Blueprint $table) {
			$table->dropForeign('rest_organization_foreign');
		});
		Schema::table('work_day', function(Blueprint $table) {
			$table->dropForeign('work_day_organization_foreign');
		});
		Schema::table('work_day', function(Blueprint $table) {
			$table->dropForeign('work_day_day_foreign');
		});
		Schema::table('appointment', function(Blueprint $table) {
			$table->dropForeign('appointment_organization_foreign');
		});
		Schema::table('organization_service', function(Blueprint $table) {
			$table->dropForeign('organization_service_service_foreign');
		});
		Schema::table('organization_service', function(Blueprint $table) {
			$table->dropForeign('organization_service_organization_foreign');
		});
		Schema::table('attachment', function(Blueprint $table) {
			$table->dropForeign('attachment_appointment_foreign');
		});
		Schema::table('org_background', function(Blueprint $table) {
			$table->dropForeign('org_background_organization_foreign');
		});
	}
}