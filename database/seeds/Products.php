<?php

use Illuminate\Database\Seeder;

class Products extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Bengkung Mama Pinggang',
				'id_category' => '3',
				'retail' => '68',
				'commission' => '2.5',
				'active' => '1',
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Bengkung Mama Punggung',
				'id_category' => '3',
				'retail' => '57',
				'commission' => '2',
				'active' => '1',
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Mandian Herba',
				'id_category' => '3',
				'retail' => '17',
				'commission' => '2',
				'active' => '1',
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Miracle Body Lotion',
				'id_category' => '3',
				'retail' => '59',
				'commission' => '2',
				'active' => '1',
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Kurv',
				'id_category' => '4',
				'retail' => '399',
				'commission' => '15',
				'active' => '1',
				'created_at' => '2017-03-19 07:45:22',
				'updated_at' => '2017-03-19 07:45:22'
			]);
	}
}
