<?php

use Illuminate\Database\Seeder;

class TaxesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('taxes')->insert([
			'tax' => 'GST',
			'amount' => 6.00,
		]);
    }
}
