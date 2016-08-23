<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$user1 = new App\User();
    $user1->email = 'user1@codeup.com';
    $user1->username = 'Luis';
    $user1->password = Hash::make('password123');
    $user1->save();

		$user2 = new App\User();
		$user2->email = 'user2@codeup.com';
		$user2->username = 'Cam';
		$user2->password = Hash::make('password123');
		$user2->save();
	}
}