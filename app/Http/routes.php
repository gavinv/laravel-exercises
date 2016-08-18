<?php
use App\Post;

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

Route::get('/', 'HomeController@showWelcome');

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

Route::get('/rolldice/{sides}', 'HomeController@rollDice');

Route::resource('/posts', 'PostsController');

Route::get('orm-test', function ()
{
	$post1 = new Post();
	$post1->title = 'Eloquent is awesome!';
	$post1->url='https://laravel.com/docs/5.1/eloquent';
	$post1->content  = 'It is super easy to create a new post.';
	$post1->created_by = 1;
	$post1->save();

	$post2 = new Post();
	$post2->title = 'Eloquent is really easy!';
	$post2->url='https://laravel.com/docs/5.1/eloquent';
	$post2->content = 'It is super easy to create a new post.';
	$post2->created_by = 1;
	$post2->save();
});