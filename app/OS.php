<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OS extends Model {

	public $table = 'os';

	public $timestamps = false;

	protected $fillable = ['class', 'detection'];

	public function jobs() {
		return $this->belongsToMany('App\Job');
	}
}