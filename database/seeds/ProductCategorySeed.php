<?php

use Illuminate\Database\Seeder;

class ProductCategorySeed extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('product_categories')->insert([
			'id_user' => 1,
			'product_category' => 'Mengandung',
			'active' => 1
			]);
		DB::table('product_categories')->insert([
			'id_user' => 1,
			'product_category' => 'Bersalin',
			'active' => 1
			]);
		DB::table('product_categories')->insert([
			'id_user' => 1,
			'product_category' => 'Berpantang',
			'active' => 1
			]);
		DB::table('product_categories')->insert([
			'id_user' => 1,
			'product_category' => 'Normal',
			'active' => 1
			]);
		DB::table('product_categories')->insert([
			'id_user' => 1,
			'product_category' => 'Perkhidmatan',
			'active' => 1
			]);
	}
}
