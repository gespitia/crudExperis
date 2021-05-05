<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Candidato;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Candidato::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'surname'=> $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->numberBetween($min = 1000000000, $max = 9999999999),
        'date_of_interview'=>$faker->dateTime($max = 'now', $timezone = null),
        'rating'=>$faker ->numberBetween($min = 1, $max = 10)
    ];
});
