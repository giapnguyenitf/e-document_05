<?php

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => 'giapnguyenitf',
        'email' => 'giapnguyenitf@gmail.com',
        'password' => bcrypt('123456'), // secret
        'remember_token' => str_random(10),
        'is_admin' => true,
        'firstname' => 'giap',
        'lastname' => 'nguyen',
        'date_of_birth' => $faker->date,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'gender' => true,
    ];
});
