<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {

	public $timestamps = false;

	protected $fillable = ['name', 'command'];

	public function os() {
		return $this->belongsToMany('App\OS');
	}

	public function operations() {
		return $this->belongsToMany('App\Operation');
	}
}