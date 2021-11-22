<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Machine;
use Faker\Generator as Faker;

$factory->define(Machine::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'type' => $faker->word
    ];
});
