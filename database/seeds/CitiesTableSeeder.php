<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    public $cities = array(
        // A
        'Albany', 'Amity',
        // B
        'Beaverton', 'Brownsville',
        // C
        'Canby', 'Carlton', 'Corvallis', 'Cottage Grove', 'Creswell',
        // D
        'Dundee',
        // E
        'Eugene',
        // F
        'Forest Grove',
        // G
        'Gresham',
        // H
        'Hillsboro',
        // I
        'Independence',
        // J
        'Junction City',
        // K
        'Keizer',
        // M
        'McMinnville','Molalla','Monmouth','Mount Angel',
        // N
        'Newberg',
        // O
        'Oregon City',
        // P
        'Portland',
        // S
        'Salem','Sherwood','Silverton','Springfield',
        // T
        'Tigard','Tualatin',
        // W
        'Woodburn',
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->cities as $city)
        {
            DB::table('cities')->insert([
                'name' => $city,
                'slug' => Str::slug($city, '-'),
            ]);
        }
    }
}
