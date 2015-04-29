<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	public $timestamps = false;

	protected $fillable = ['name', 'email', 'password'];

	protected $hidden = ['password'];

	public function setPasswordAttribute($value) {
		$this->attributes['password'] = app()['hash']->make($value);
	}

	public function servers() {
		return $this->hasMany('App\Server');
	}
}