<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert the initial users
        DB::table('users')->insert([
            [
                'name' => 'Dustin User',
                'email' => 'dustin@dustinboling.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Julie User',
                'email' => 'julie@dustinboling.com',
                'password' => bcrypt('123456'),
            ]
        ]);
    }
}
