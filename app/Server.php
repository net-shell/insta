<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Server extends Model {

	use SoftDeletes;

	protected $fillable = ['name', 'credentials', 'meta', 'user_id'];
	
	protected $hidden = ['credentials', 'user_id'];
	
	protected $dates = ['deleted_at'];

	public function user() {
		return $this->belongsTo('App\User');
	}
}