<?php

// Public routes
$app->group(['namespace' => 'App\Http\Controllers'], function() use ($app) {

	$app->get('auth/login', 'AuthController@getLogin');
	$app->post('auth/login', 'AuthController@postLogin');

	$app->get('test', 'TestController@index');
	$app->post('test', 'TestController@work');
});

// Authentication required
$app->group(['namespace' => 'App\Http\Controllers', 'middleware' => 'auth'], function() use ($app) {

	$app->get('auth/logout', 'AuthController@logout');

	$app->get('/', function() {
		return view('app');
	});

	$app->get('servers', 'ServersController@index');
	$app->post('servers', 'ServersController@store');
	$app->get('servers/{id}', 'ServersController@show');
	$app->delete('servers/{id}', 'ServersController@disable');
	$app->delete('servers/{id}/destroy', 'ServersController@destroy');
	$app->get('servers/{id}/enable', 'ServersController@enable');
	$app->post('servers/test', 'ServersController@test');
	
	$app->get('jobs', 'JobsController@index');
});