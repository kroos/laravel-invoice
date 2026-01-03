<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxesSeeder extends Seeder
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
            'slug' => 'gst',
			'amount' => 6.00,
		]);
    }
}
