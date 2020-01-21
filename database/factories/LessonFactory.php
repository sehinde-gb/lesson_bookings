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
        'title' => $faker->title,
        'body' => $faker->name,
        'lecturer' => $faker->name,
        'objectives' => $faker->text,
        'prerequisites' => $faker->text,
        'evaluation' => $faker->text,
        'resources' => $faker->text,
        'activity' => $faker->text

    ];
});