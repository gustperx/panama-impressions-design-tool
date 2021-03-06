<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Modules\Auth\User::class, function (Faker\Generator $faker) {

    return [
        'first_name'         => $faker->firstName,
        'last_name'          => $faker->lastName,
        'email'              => $faker->unique()->safeEmail,
        'password'           => 'gt123456',
        'status'             => $faker->randomElement(['active', 'inactive', 'banned']),
        'registration_token' => str_random(60),
    ];

});
