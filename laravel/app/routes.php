<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'showcase', function()
{
	return View::make('showcase');
}));

Route::get('dashboard', array('as' => 'dashboard',  function()
{
	// if user is donator
	// code...
	$usertype = Input::get('usertype');
	if($usertype === "donator") {
		return View::make('donator_dashboard');
	} elseif($usertype === "recycler") {
		// if user is recycler
		return View::make('recycler_dashboard');
	} else {
		return Redirect::to('/');
	}
}));

Route::get('api', function()
{
	return 'api';
});

Route::get('signup/donator', array('as' => 'donator signup',  function()
{
	return View::make('donator_signup');
}));

Route::get('signup/recycler', array('as' => 'recycler signup',  function()
{
	return View::make('recycler_signup'); 
}));


Route::get('login/{mode?}', array('as' => 'login', function($mode = NULL)
{
	if(!$mode) {
		return View::make('login');
	} else {
		return Redirect::to('/');
	}
}));

