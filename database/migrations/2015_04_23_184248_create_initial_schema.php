<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialSchema extends Migration {

	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('email');
			$table->string('name')->unique();
			$table->string('password', 60);
			$table->rememberToken();
		});

		Schema::create('servers', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('credentials');
			$table->text('meta')->nullable();
			$table->integer('user_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('users');
		Schema::drop('servers');
	}

}
