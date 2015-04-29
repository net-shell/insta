<?php namespace App\Contracts;

interface SSH {

	public function setup($host, $port);
	
	public function login($username);

	public function exec($command, $callback);
}