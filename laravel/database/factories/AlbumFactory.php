<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Album::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'cover_photo' => 'http://via.placeholder.com/150x150',
        'released_at' => Carbon::instance($faker->dateTime()),
    ];
});
