<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Server;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$user = new User(['email' => 'ash@rain.com', 'name' => 'Ash', 'password' => 'b4lk4n$k1']);
		$user->save();

		(new Server(['name' => 'Linode 1', 'credentials' => '{"host":"178.79.171.228","user":"root","pass":"b4lk4n$k1"}', 'user_id' => $user->id]))->save();
	}

}
