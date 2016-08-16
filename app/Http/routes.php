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

Route::get('/', function () {
	return view('welcome');
});

Route::get('/sayhello/{name?}', function ($name) {
	return "Hello, $name";
});

Route::get('/uppercase/{string}', function($string) {
	$data['string'] = strtoupper($string);
	return view('uppercase', $data);
});

Route::get('/increment/{number}', function($number) {
	$number++;
	return $number;
});

Route::get('/add/{num1}/{num2}', function($num1, $num2) {
	return ($num1 + $num2);
});

Route::get('/rolldice/{sides}', function($sides) {
	$data['result'] = mt_rand(1, $sides);
	return view('roll-dice', $data);
});