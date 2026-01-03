<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	*/
	public function run()
	{
	// $this->call(UsersTableSeeder::class);
		$this->call([
			UserGroupSeeder::class,
			UserSeeder::class,
			ProductCategorySeeder::class,
			ProductsSeeder::class,
			ProductImagesSeeder::class,
			BanksSeeder::class,
			TaxesSeeder::class,
			PreferencesSeeder::class
		]);
	}
}
