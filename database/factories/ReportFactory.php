<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {

    return [
        'patient_id' => $faker->randomDigitNotNull,
        'date_on' => $faker->word,
        'time_on' => $faker->word,
        'date_off' => $faker->word,
        'machine_id' => $faker->randomDigitNotNull
    ];
});
