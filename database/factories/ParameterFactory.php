<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parameter;
use Faker\Generator as Faker;

$factory->define(Parameter::class, function (Faker $faker) {

    return [
        'arterial_press' => $faker->word,
        'venous_press' => $faker->word,
        'dyalizate_press' => $faker->word,
        'temperature' => $faker->word,
        'conductivity' => $faker->word,
        'sodium' => $faker->word,
        'bicarbonate' => $faker->word,
        'uf_remove' => $faker->word,
        'uf_objective' => $faker->word,
        'uf_rate' => $faker->word,
        'time' => $faker->word,
        'fluid' => $faker->word,
        'warning' => $faker->word,
        'machine_report_id' => $faker->randomDigitNotNull
    ];
});
