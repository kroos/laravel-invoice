<?php

use Illuminate\Database\Seeder;

class UserGroups extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		DB::table('user_groups')->insert([
			'group' => 'Administrator'
			]);
		DB::table('user_groups')->insert([
			'group' => 'Officer'
			]);
	}
}
