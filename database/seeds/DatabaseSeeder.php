<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           
        User::create([
			'email' => 'admin@admin.com',
			'password' => Hash::make('admin'),
			'name' =>	'admin',
		]);
    }
}
