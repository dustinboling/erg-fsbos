<?php

use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert the initial administrators
        DB::table('administrators')->insert([
            [
                'name' => 'Dustin Boling',
                'email' => 'dustin@eugenerealtygroup.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Shannon Doyle',
                'email' => 'shannon@eugenerealtygroup.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Matt Doyle',
                'email' => 'matt@eugenerealtygroup.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Veronica Weidmann',
                'email' => 'veronica@eugenerealtygroup.com',
                'password' => bcrypt('123456'),
            ]
        ]);
    }
}
