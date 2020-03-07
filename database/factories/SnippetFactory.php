<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Snippet;
use Faker\Generator as Faker;

$factory->define(Snippet::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->paragraphs(3, true),
        'expired_at' => $faker->dateTimeInInterval('now', '+1 hours'),
        'access_mode_id' => \App\SnippetsAccessMode::all()->random()->id,
    ];
});
