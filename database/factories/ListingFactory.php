<?php

use Faker\Generator as Faker;

$factory->define(App\Listing::class, function (Faker $faker) {
    return [
        //
        'street_address' => $faker->buildingNumber() . " " . $faker->streetName(),
        'city' => $faker->city(),
        'state' => $faker->stateAbbr(),
        'zip' => $faker->postcode(),
        'price' => $faker->numberBetween(89, 999) * 1000,
        'beds' => $faker->numberBetween(2, 4),
        'baths' => $faker->numberBetween(1, 3),
        'half_baths' => $faker->numberBetween(0, 2),
        'sqft' => $faker->biasedNumberBetween(1400, 3500, 'sqrt'),
        'community' => $faker->city(),
        'neighborhood' => $faker->city(),
        'description' => $faker->paragraphs(rand(2, 4), true)
    ];
});
