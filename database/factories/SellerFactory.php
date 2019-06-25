<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Seller;
use Faker\Generator as Faker;

$factory->define(Seller::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => '541-555-' . rand(1000,9999),
        'email' => $faker->unique()->safeEmail,
    ];
});
