<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
			'id_group' => 1,
			'name' => 'Dhiauddin',
			'email' => 'dhiauddin@gmail.com',
			'password' => bcrypt('123123'),
			'color' => 'rgba(250, 0, 0, 0.61)',
			]);
		DB::table('users')->insert([
			'id_group' => 2,
			'name' => 'Fatihah',
			'email' => 'fatihah@gmail.com',
			'password' => bcrypt('123123'),
			'color' => 'rgba(102, 92, 214, 0.8)',
			]);
		DB::table('users')->insert([
			'id_group' => 2,
			'name' => 'Syazwani',
			'email' => 'syazwani@gmail.com',
			'password' => bcrypt('123123'),
			'color' => 'rgba(150, 245, 106, 0.8)',
			]);
    }
}
