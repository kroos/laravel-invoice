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
				'created_at' => '2017-03-29 10:47:49',
				'updated_at' => '2017-03-29 10:47:49'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Bengkung Mama Punggung',
				'id_category' => '3',
				'retail' => '57',
				'commission' => '2',
				'active' => '1',
				'created_at' => '2017-03-29 10:49:18',
				'updated_at' => '2017-03-29 10:49:18'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Mandian Herba',
				'id_category' => '3',
				'retail' => '17',
				'commission' => '0.5',
				'active' => '1',
				'created_at' => '2017-03-29 10:50:03',
				'updated_at' => '2017-03-29 10:50:03'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Miracle Body Lotion',
				'id_category' => '4',
				'retail' => '59',
				'commission' => '2',
				'active' => '1',
				'created_at' => '2017-03-29 10:51:29',
				'updated_at' => '2017-03-29 10:51:29'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'KurV',
				'id_category' => '4',
				'retail' => '399',
				'commission' => '5',
				'active' => '1',
				'created_at' => '2017-03-29 10:53:39',
				'updated_at' => '2017-03-29 10:53:39'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Ultraslim',
				'id_category' => '4',
				'retail' => '230',
				'commission' => '5',
				'active' => '1',
				'created_at' => '2017-03-29 09:56:21',
				'updated_at' => '2017-03-29 09:56:21'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Hide-It',
				'id_category' => '4',
				'retail' => '39',
				'commission' => '1',
				'active' => '1',
				'created_at' => '2017-03-29 10:05:15',
				'updated_at' => '2017-03-29 10:05:15'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Miracle Body Lotion Sample',
				'id_category' => '3',
				'retail' => '8',
				'commission' => '0.5',
				'active' => '1',
				'created_at' => '2017-03-29 10:07:22',
				'updated_at' => '2017-03-29 10:07:22'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Bedak Panas (Param, Pilis & Lulur)',
				'id_category' => '3',
				'retail' => '35',
				'commission' => '0.5',
				'active' => '1',
				'created_at' => '2017-03-29 10:33:13',
				'updated_at' => '2017-03-29 10:33:13'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Homemade Miracle Oil (Small)',
				'id_category' => '3',
				'retail' => '29',
				'commission' => '0',
				'active' => '1',
				'created_at' => '2017-03-29 10:38:02',
				'updated_at' => '2017-03-29 10:38:02'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Homemade Miracle Oil (Large)',
				'id_category' => '3',
				'retail' => '49',
				'commission' => '1',
				'active' => '1',
				'created_at' => '2017-03-29 10:40:08',
				'updated_at' => '2017-03-29 10:40:08'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Tungku Besi',
				'id_category' => '3',
				'retail' => '40',
				'commission' => '0',
				'active' => '1',
				'created_at' => '2017-03-29 10:41:28',
				'updated_at' => '2017-03-29 10:41:28'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Sarung Tungku',
				'id_category' => '3',
				'retail' => '45',
				'commission' => '1',
				'active' => '1',
				'created_at' => '2017-03-29 10:42:47',
				'updated_at' => '2017-03-29 10:42:47'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Tungku Batu Sungai',
				'id_category' => '3',
				'retail' => '69.9',
				'commission' => '0',
				'active' => '1',
				'created_at' => '2017-03-29 10:45:30',
				'updated_at' => '2017-03-29 10:45:30'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Herba Tangas',
				'id_category' => '3',
				'retail' => '39',
				'commission' => '0.5',
				'active' => '1',
				'created_at' => '2017-03-29 15:38:11',
				'updated_at' => '2017-03-29 15:38:11'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Bangku Tangas Rotan',
				'id_category' => '3',
				'retail' => '135',
				'commission' => '2',
				'active' => '1',
				'created_at' => '2017-03-29 15:43:20',
				'updated_at' => '2017-03-29 15:43:20'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Selimut Tangas',
				'id_category' => '3',
				'retail' => '120',
				'commission' => '1',
				'active' => '1',
				'created_at' => '2017-03-29 15:46:22',
				'updated_at' => '2017-03-29 15:46:22'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Periuk Tangas',
				'id_category' => '3',
				'retail' => '25',
				'commission' => '0.5',
				'active' => '1',
				'created_at' => '2017-03-29 15:48:44',
				'updated_at' => '2017-03-29 15:48:44'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Tuam Bayi',
				'id_category' => '2',
				'retail' => '15.9',
				'commission' => '0',
				'active' => '1',
				'created_at' => '2017-03-29 15:52:02',
				'updated_at' => '2017-03-29 15:52:02'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Minyak Telon',
				'id_category' => '2',
				'retail' => '29',
				'commission' => '0',
				'active' => '1',
				'created_at' => '2017-03-29 15:53:07',
				'updated_at' => '2017-03-29 15:53:07'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Minyak Celak',
				'id_category' => '2',
				'retail' => '15',
				'commission' => '0',
				'active' => '1',
				'created_at' => '2017-03-29 15:55:59',
				'updated_at' => '2017-03-29 15:55:59'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Minyak Serai Wangi',
				'id_category' => '2',
				'retail' => '15',
				'commission' => '0',
				'active' => '1',
				'created_at' => '2017-03-29 15:56:26',
				'updated_at' => '2017-03-29 15:56:26'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Seluar Mengandung (New)',
				'id_category' => '1',
				'retail' => '89',
				'commission' => '3',
				'active' => '1',
				'created_at' => '2017-03-29 16:02:39',
				'updated_at' => '2017-03-29 16:02:39'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Seluar Mengandung (Prelove)',
				'id_category' => '1',
				'retail' => '50',
				'commission' => '1',
				'active' => '1',
				'created_at' => '2017-03-29 16:08:37',
				'updated_at' => '2017-03-29 16:08:37'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Clothe Diaper',
				'id_category' => '4',
				'retail' => '20',
				'commission' => '0.5',
				'active' => '1',
				'created_at' => '2017-03-29 17:03:26',
				'updated_at' => '2017-03-29 17:03:26'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Insert Micro',
				'id_category' => '4',
				'retail' => '10',
				'commission' => '0.5',
				'active' => '1',
				'created_at' => '2017-03-29 17:05:12',
				'updated_at' => '2017-03-29 17:05:12'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Insert Bamboo',
				'id_category' => '4',
				'retail' => '15',
				'commission' => '0.5',
				'active' => '1',
				'created_at' => '2017-03-29 17:13:18',
				'updated_at' => '2017-03-29 17:13:18'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Bengkung AS Beauty',
				'id_category' => '3',
				'retail' => '58.9',
				'commission' => '1',
				'active' => '1',
				'created_at' => '2017-03-29 17:46:15',
				'updated_at' => '2017-03-29 17:46:15'
			]);

		DB::table('products')->insert([
				'id_user' => '1',
				'product' => 'Bengkung Express',
				'id_category' => '3',
				'retail' => '85',
				'commission' => '1',
				'active' => '1',
				'created_at' => '2017-03-29 18:15:20',
				'updated_at' => '2017-03-29 18:15:20'
			]);
	}
}
