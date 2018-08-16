<?php

use Faker\Generator as Faker;

$factory->define(App\Song::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        // in secods
        'duration' => $faker->numberBetween(3, 300),
        'composer' => $faker->name,
        'order_number' => $faker->numberBetween(1, 30),
    ];
});
