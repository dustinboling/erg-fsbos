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
                'name' => 'Dustin',
                'email' => 'dustin@example.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Shannon',
                'email' => 'shannon@example.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Matt',
                'email' => 'matt@example.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Veronica',
                'email' => 'veronica@example.com',
                'password' => bcrypt('123456'),
            ]
        ]);
    }
}
