<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Friendship::class, function (Faker $faker) {
    return [
        'first_user' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
        'second_user' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
        'status' => true,
    ];
});
