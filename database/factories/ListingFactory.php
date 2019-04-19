<?php

use Faker\Generator as Faker;

$factory->define(App\Listing::class, function (Faker $faker) {
    return [
        'agent_id' => rand(1,3),
        'city_id' => rand(1,30),
        'street_address' => $faker->buildingNumber() . " " . $faker->streetName(),
        'zip' => rand(97001, 97920),
        'price' => $faker->numberBetween(89, 999) * 1000,
        'beds' => $faker->numberBetween(2, 4),
        'baths' => $faker->numberBetween(1, 3),
        'sqft' => $faker->biasedNumberBetween(1400, 3500, 'sqrt'),
        'description' => $faker->paragraphs(rand(2, 4), true),
        'live' => rand(0,1),
        'featured' => 0,
        'call_code' => $faker->biasedNumberBetween(1000, 9999, 'sqrt'),
        'text_code' => "WVHOME" . rand(1,48),
    ];
});
