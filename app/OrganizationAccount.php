<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrganizationAccount extends Model {

	protected $table = 'organization_account';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}