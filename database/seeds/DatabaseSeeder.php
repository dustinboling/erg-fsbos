<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AgentsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        factory('App\Seller', 5)->create();
        factory('App\Listing', 48)->create();
    }
}
