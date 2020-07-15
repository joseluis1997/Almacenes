<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

// $factory->define(User::class, function (Faker $faker) {
//     return [
//     	'ci' => $faker->postcode,
//         'name' => $faker->name,
//         'lastname' => $faker->lastName,
//         'telephone' => $faker->PhoneNumber,
//        	'username'=>$faker->userName,
//         'password' => Hash::make('pass123'), 
//     ];
// });