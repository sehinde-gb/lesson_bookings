<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lesson;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->bs,
        'description' => $faker->text(40),
        'lecturer' => $faker->lastName,
        'objectives' => $faker->text(50),
        'prerequisites' => $faker->text(10),
        'evaluation' => $faker->text(10),
        'resources' => $faker->text(10),
        'activity' => $faker->text(10)

    ];
});