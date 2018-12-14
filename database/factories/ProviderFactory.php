<?php

use Faker\Generator as Faker;

$factory->define(App\Provider::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'short_code' => $faker->postcode,
    ];
});
