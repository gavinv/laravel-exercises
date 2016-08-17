<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function showWelcome() 
	{
		return view('welcome');
	}

	public function rollDice($sides) 
	{
		$data['result'] = mt_rand(1, $sides);
		return view('roll-dice', $data);
	}

	
}
