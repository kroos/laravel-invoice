<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('user_groups')->insert([
			'group' => 'Administrator',
			]);
		DB::table('user_groups')->insert([
			'group' => 'Staff',
			]);
    }
}
