<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class OrganizationAccount extends Model implements AuthenticatableContract, CanResetPasswordContract {

    
    use Authenticatable, CanResetPassword;
    
	protected $table = 'organization_account';


        
        protected $fillable = [
            'password',
            'creator_admin',
            'id',
            'username'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password'];

}