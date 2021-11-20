<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->company(),
        'excertpt' => $faker->sentence(2),
        'email' => $faker->email(),
    ];
});
