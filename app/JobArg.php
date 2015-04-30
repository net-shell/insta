<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class JobArg extends Model {

	public $timestamps = false;

	protected $fillable = ['type', 'content', 'job_id'];

	public function job() {
		return $this->hasOne('App\Job');
	}
}