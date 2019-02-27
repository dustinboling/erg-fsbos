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
            'name' => 'Dustin Boling',
            'email' => 'dustin@eugenerealtygroup.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Shannon Doyle',
            'email' => 'shannon@eugenerealtygroup.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
