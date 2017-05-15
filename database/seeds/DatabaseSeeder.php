<?php

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
		$this->call(UserSeed::class);
		$this->call(UserGroupSeed::class);
		$this->call(ProductCategorySeed::class);
		$this->call(ProductsSeed::class);
		$this->call(ProductImagesSeed::class);
		$this->call(BanksSeed::class);
		$this->call(TaxesSeed::class);
		$this->call(PreferencesSeed::class);
	}
}
