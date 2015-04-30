<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTables extends Migration {

	public function up()
	{
		Schema::create('os', function($table)
		{
			$table->increments('id');
			$table->string('class');
			$table->string('detection')->unique();
		});

		Schema::create('jobs', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('command', 400);
		});

		Schema::create('job_os', function($table)
		{
			$table->integer('job_id');
			$table->integer('os_id');
		});

		Schema::create('job_args', function($table)
		{
			$table->increments('id');
			$table->integer('type');
			$table->string('content');
			$table->integer('job_id');
		});

		Schema::create('operations', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->boolean('shared')->nullable();
			$table->integer('user_id')->nullable();
		});

		Schema::create('job_operation', function($table)
		{
			$table->integer('job_id');
			$table->integer('operation_id');
		});
	}

	public function down()
	{
		Schema::drop('os');
		Schema::drop('jobs');
		Schema::drop('job_os');
		Schema::drop('job_args');
		Schema::drop('operations');
		Schema::drop('job_operation');
	}

}
