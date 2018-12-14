<?php

use Faker\Generator as Faker;

$factory->define(App\Song::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence('3', true),
        'provider_id' => function() {
            return factory(App\Models\Provider::class)->create()->id;
        },
        'code' => $faker->countryCode,
        'is_popular' => $faker->boolean()
    ];
});
