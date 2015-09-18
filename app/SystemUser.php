<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemUser extends Model {

	protected $table = 'system_user';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}