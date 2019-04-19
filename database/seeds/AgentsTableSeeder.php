<?php

use Illuminate\Database\Seeder;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert the initial administrators
        DB::table('agents')->insert([
            [
                'name' => 'Dustin Agent',
                'phone' => '555-555-5555',
                'email' => 'dustin@eugenerealtygroup.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Shannon Agent',
                'phone' => '555-555-5555',
                'email' => 'shannon@eugenerealtygroup.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Matt Agent',
                'phone' => '555-555-5555',
                'email' => 'matt@eugenerealtygroup.com',
                'password' => bcrypt('123456'),
            ]
        ]);
    }
}
