<?php

use Illuminate\Database\Seeder;

class Categories extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		DB::table('categories')->insert([
			'id_user' => 1,
			'category' => 'Mengandung',
			'active' => 1
			]);
		DB::table('categories')->insert([
			'id_user' => 1,
			'category' => 'Bersalin',
			'active' => 1
			]);
		DB::table('categories')->insert([
			'id_user' => 1,
			'category' => 'Berpantang',
			'active' => 1
			]);
		DB::table('categories')->insert([
			'id_user' => 1,
			'category' => 'Normal',
			'active' => 1
			]);
	}
}
