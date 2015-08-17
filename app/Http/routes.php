<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(array( 'prefix' => 'admin', 'middleware' => 'notAdmin', 'namespace' => 'Admin' ), function () {
	Route::controller('/login', 'AuthController');
});

Route::group(array( 'prefix' => 'admin', 'middleware' => 'adminAuth', 'namespace' => 'Admin' ), function () {
	Route::pattern('id', '[0-9]+');
	Route::controllers(
		array(
			"/" => "AdminController",
		)
	);
});

Route::controllers(
	array(
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
		"/" => "HomeController",
	)
);