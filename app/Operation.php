<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model {

	public $timestamps = false;

	protected $fillable = ['name', 'shared'];

	public function jobs() {
		return $this->belongsToMany('App\Job');
	}
}