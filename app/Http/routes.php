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

	$app->get('/', 'DashboardController@index');

	$app->get('servers', 'ServersController@index');
	$app->post('servers', 'ServersController@store');
	$app->get('servers/{id}', 'ServersController@show');
	$app->delete('servers/{id}', 'ServersController@destroy');
	$app->post('servers/test', 'ServersController@test');
});